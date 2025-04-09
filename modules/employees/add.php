<?php

require '../../db/db.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {

$stm = $pdo->prepare("INSERT INTO Employees (FirstName, LastName, Email, Phone, HireDate, JobTitle, Department, Salary, BankAccountNumber, TaxID) 
VALUES 
('Parker', 'Victor', 'Parker.v@example.com', '1234567890', '2022-05-10', 'Software Engineer', 'Dev', 80000.00, '12345678901', 'TAX091');");
$stm->execute();
header("Location: /");
exit;
}



