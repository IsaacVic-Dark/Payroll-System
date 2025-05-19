<?php

require_once 'C:\laragon\www\payroll_system\db\db.php';
require_once 'C:\laragon\www\payroll_system\modules\employees\show.php';
require_once 'C:\laragon\www\payroll_system\modules\leave\controller.php';

$id = 10;

$employee = fetchEmployeeById($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'leave') {

        $leaveApplication= [
            "id" => 10,
            "LeaveType" => $_POST['leaveType'],
            "StartDate" => $_POST['StartDate'],
            "EndDate" => $_POST['EndDate'],
            "Status" => $_POST['Status'],
        ];

        applyLeaveByID($pdo, $leaveApplication);

        header("Location: /resources/layouts/profile_employee.php");
        exit();
    }
}

?>

<h1>Employee page</h1>

<h2>Hi, <?= $employee['FirstName'] ?></h2>
<p><strong>Last Name:</strong> <?= $employee['LastName'] ?></p>
<p><strong>Email:</strong> <?= $employee['Email'] ?></p>
<p><strong>Phone:</strong> <?= $employee['Phone'] ?></p>
<p><strong>Hire Date:</strong> <?= $employee['HireDate'] ?></p>
<p><strong>Job Title:</strong> <?= $employee['JobTitle'] ?></p>
<p><strong>Department:</strong> <?= $employee['Department'] ?></p>
<p><strong>Salary:</strong> <?= number_format($employee['Salary'], 2) ?></p>
<p><strong>Bank Account Number:</strong> <?= $employee['BankAccountNumber'] ?></p>
<p><strong>Tax ID:</strong> <?= $employee['TaxID'] ?></p>

<h2>Leave application</h2>
<form action="" method="POST">
    <label for="leaveType">Leave Type:</label>
    <select name="leaveType" id="leaveType">
        <option value="Sick">Sick</option>
        <option value="Casual">Casual</option>
        <option value="Annual">Annual</option>
        <option value="Maternity">Maternity</option>
        <option value="Paternity">Paternity</option>
    </select>
    <label for="StartDate">Start date:</label>
    <input type="date" name="StartDate">
    <label for="EndDate">End date:</label>
    <input type="date" name="EndDate">
    <input type="hidden" name="Status" value="pending">
    <button type="submit" name="action" value="leave">Apply for a leave</button>
</form>