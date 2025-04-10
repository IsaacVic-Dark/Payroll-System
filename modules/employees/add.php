<?php

// require dirname(__DIR__) . '/db/db.php';
require '../../db/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee = [
        'MAne',
        'Victor',
        'MAne.v@example.com',
        '1234567890',
        '2022-05-10',
        'Software Engineer',
        'Dev',
        80000.00,
        '12345678901',
        'TAX091'
    ];
    $stm = $pdo->prepare("INSERT INTO Employees (FirstName, LastName, Email, Phone, HireDate, JobTitle, Department, Salary, BankAccountNumber, TaxID) 
    VALUES (?,?,?,?,?,?,?,?,?,?);");
    $stm->execute($employee);
    header("Location: /");
    exit;
}
