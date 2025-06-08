<?php

require __DIR__ . '../../../db/db.php';
require_once __DIR__ . '../../../helper/helper.php';
require_once __DIR__ . '../../deductions/tax.php';

function fetchAllEmployees($pdo)
{
    $pagination = PaginationHelper::getPagination([
        'pdo' => $pdo,
        'table' => 'employees',
        'limit' => 5,
    ]);

    $stmt = $pdo->prepare("SELECT e.*, p.PaymentStatus FROM employees AS e JOIN payroll AS p ON p.EmployeeID = e.EmployeeID LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $pagination['limit'], PDO::PARAM_INT);
    $stmt->bindValue(':offset', $pagination['offset'], PDO::PARAM_INT);
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [$employees, $pagination['totalPages'], $pagination['page']];
}

function fetchEmployeeById($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE EmployeeID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    return $employee;
}

function fetchEmployeeByName($pdo, $name)
{
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE FirstName LIKE :name OR LastName LIKE :name");
    $name = "%$name%";
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $employees;
}

function deleteEmployeeByID($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM employees WHERE EmployeeID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function addEmployee($pdo, $employeeDetail)
{

    // 1. Generate Email and Password
    $domain = 'payroll.com';
    $firstName = strtolower($employeeDetail['FirstName']);
    $lastName = strtolower($employeeDetail['LastName']);
    $generatedEmail = "{$firstName}.{$lastName}@{$domain}";
    $rawPassword = "payroll@{$firstName}";
    $hashedPassword = password_hash($rawPassword, PASSWORD_BCRYPT);

    // 2. Insert into Employees
    $stmt = $pdo->prepare("INSERT INTO Employees (
        FirstName, LastName, Email, Phone, HireDate, 
        JobTitle, Department, Salary, BankAccountNumber, TaxID
    ) VALUES (
        :FirstName, :LastName, :Email, :Phone, :HireDate,
        :JobTitle, :Department, :Salary, :BankAccountNumber, :TaxID
    )");

    $stmt->execute([
        ':FirstName' => $employeeDetail['FirstName'],
        ':LastName' => $employeeDetail['LastName'],
        ':Email' => $generatedEmail, 
        ':Phone' => $employeeDetail['Phone'],
        ':HireDate' => $employeeDetail['HireDate'],
        ':JobTitle' => $employeeDetail['JobTitle'],
        ':Department' => $employeeDetail['Department'],
        ':Salary' => $employeeDetail['Salary'],
        ':BankAccountNumber' => $employeeDetail['BankAccountNumber'],
        ':TaxID' => $employeeDetail['TaxID'],
    ]);

    $employeeId = $pdo->lastInsertId();

    // 3. Determine UserType based on Department
    $department = strtolower($employeeDetail['Department']);
    $userType = ($department === 'hr') ? 'admin' : 'user';

    // 4. Insert into Users
    $username = "{$firstName}.{$lastName}";
    $userStmt = $pdo->prepare("INSERT INTO Users (
        Username, PasswordHash, Email, UserType
    ) VALUES (
        :Username, :PasswordHash, :Email, :UserType
    )");

    $userStmt->execute([
        ':Username' => $username,
        ':PasswordHash' => $hashedPassword,
        ':Email' => $generatedEmail,
        ':UserType' => $userType
    ]);

    // 5. Insert into Payroll
    $payPeriodStart = date('Y-m-01');
    $payPeriodEnd = date('Y-m-t');
    $baseSalary = $employeeDetail['Salary'];

    $payrollStmt = $pdo->prepare("INSERT INTO Payroll (
        EmployeeID, PayPeriodStart, PayPeriodEnd, BaseSalary
    ) VALUES (
        :EmployeeID, :PayPeriodStart, :PayPeriodEnd, :BaseSalary
    )");

    $payrollStmt->execute([
        ':EmployeeID' => $employeeId,
        ':PayPeriodStart' => $payPeriodStart,
        ':PayPeriodEnd' => $payPeriodEnd,
        ':BaseSalary' => $baseSalary
    ]);
}


function updateEmployee($pdo, $id, $employeeDetail)
{
    $stmt = $pdo->prepare("UPDATE Employees SET 
    FirstName = :FirstName, LastName = :LastName, Email = :Email, 
    Phone = :Phone, HireDate = :HireDate, JobTitle = :JobTitle, 
    Department = :Department, Salary = :Salary, 
    BankAccountNumber = :BankAccountNumber, TaxID = :TaxID
    WHERE EmployeeID = :id");

    $stmt->execute([
        ':FirstName' => $employeeDetail['FirstName'],
        ':LastName' => $employeeDetail['LastName'],
        ':Email' => $employeeDetail['Email'],
        ':Phone' => $employeeDetail['Phone'],
        ':HireDate' => $employeeDetail['HireDate'],
        ':JobTitle' => $employeeDetail['JobTitle'],
        ':Department' => $employeeDetail['Department'],
        ':Salary' => $employeeDetail['Salary'],
        ':BankAccountNumber' => $employeeDetail['BankAccountNumber'],
        ':TaxID' => $employeeDetail['TaxID'],
        ':id' => $id
    ]);
}

function countEmployees($pdo)
{
    $stmt = $pdo->query("SELECT COUNT(*) FROM employees");
    return $stmt->fetchColumn();
}
