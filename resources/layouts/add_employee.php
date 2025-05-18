<?php

require 'C:\laragon\www\payroll_system\modules\employees\show.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] == 'add'){
    $employeeDetail = [
        'FirstName' => $_POST['FirstName'],
        'LastName' => $_POST['LastName'],
        'Email' => $_POST['email'],
        'Phone' => $_POST['phone'],
        'HireDate' => $_POST['hireDate'],
        'JobTitle' => $_POST['jobTitle'],
        'Department' => $_POST['department'],
        'Salary' => $_POST['salary'],
        'BankAccountNumber' => $_POST['bankAccountNumber'],
        'TaxID' => $_POST['taxID'],
    ];
    addEmployee($pdo, $employeeDetail);
}
?>

<h1>Add Employee</h1>

<form action="add_employee.php" method="POST">
    <input type="text" name="FirstName" placeholder="Enter first name">
    <input type="text" name="LastName" placeholder="Enter last name">
    <input type="email" name="email" placeholder="Enter email">
    <input type="tel" name="phone" placeholder="Enter phone number">
    <input type="text" name="jobTitle" placeholder="Enter job title">
    <input type="text" name="department" placeholder="Enter department">
    <input type="number" name="salary" placeholder="Enter salary">
    <input type="number" name="bankAccountNumber" placeholder="Enter bank account number">
    <input type="date" name="hireDate" placeholder="Enter hire date">
    <input type="text" name="taxID" placeholder="Enter Tax ID">
    <button type="submit" name="action" value="add">Save employee</button>
</form>