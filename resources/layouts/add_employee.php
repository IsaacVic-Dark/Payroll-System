<?php

echo"<h2>Add Employee</h2>";

require __DIR__ . '../../../modules/employees/controller.php';
include __DIR__ . '../../components/nav.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] == 'add') {
    $employeeDetail = [
        'FirstName' => $_POST['FirstName'],
        'LastName' => $_POST['LastName'],
        // 'Email' => $_POST['email'],
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


<form action="" method="POST">
    <input type="text" name="FirstName" placeholder="Enter first name">
    <input type="text" name="LastName" placeholder="Enter last name">
    <!-- <input type="email" name="email" placeholder="Enter email"> -->
    <input type="tel" name="phone" placeholder="Enter phone number">
    <input type="text" name="jobTitle" placeholder="Enter job title">
    <select name="department" id="department">
        <option value="">-- Select Department --</option>
        <option value="hr">Human Resources</option>
        <option value="finance">Finance</option>
        <option value="it">Information Technology</option>
        <option value="marketing">Marketing</option>
        <option value="sales">Sales</option>
        <option value="operations">Operations</option>
        <option value="legal">Legal</option>
        <option value="procurement">Procurement</option>
        <option value="customer_service">Customer Service</option>
        <option value="research_development">Research & Development</option>
    </select>

    <input type="number" name="salary" placeholder="Enter salary">
    <input type="number" name="bankAccountNumber" placeholder="Enter bank account number">
    <input type="date" name="hireDate" placeholder="Enter hire date">
    <input type="text" name="taxID" placeholder="Enter Tax ID">
    <button type="submit" name="action" value="add">Save employee</button>
</form>