<?php

require __DIR__ . '../../../db/db.php';

require_once __DIR__ . '../../../helper/helper.php';


function fetchAllEmployees($pdo)
{
    $pagination = PaginationHelper::getPagination([
        'pdo' => $pdo,
        'table' => 'employees',
        'limit' => 5,
    ]);

    $stmt = $pdo->prepare("SELECT * FROM employees LIMIT :limit OFFSET :offset");
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
        ':Email' => $employeeDetail['Email'],
        ':Phone' => $employeeDetail['Phone'],
        ':HireDate' => $employeeDetail['HireDate'],
        ':JobTitle' => $employeeDetail['JobTitle'],
        ':Department' => $employeeDetail['Department'],
        ':Salary' => $employeeDetail['Salary'],
        ':BankAccountNumber' => $employeeDetail['BankAccountNumber'],
        ':TaxID' => $employeeDetail['TaxID'],
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