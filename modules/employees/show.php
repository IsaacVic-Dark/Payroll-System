<?php

require 'C:\laragon\www\payroll_system\db\db.php';

function fetchAllEmployees($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM employees");
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $employees;
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
