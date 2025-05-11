<?php 
echo "<h1>Employees</h1>";
require 'C:\laragon\www\payroll_system\modules\employees\show.php';
$employees = fetchAllEmployees($pdo);
?>

<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    h1 {
        text-align: center;
        font-family: Arial, sans-serif;
    }
</style>

<table>
    <tr>
        <th>First Name</th>
        <th>Job Title</th>
        <th>Salary</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr onclick="window.location='employee_profile.php?id=<?= $employee['EmployeeID'] ?>'" style="cursor: pointer;">
            <td><?= htmlspecialchars($employee['FirstName']) ?></td>
            <td><?= htmlspecialchars($employee['JobTitle']) ?></td>
            <td><?= htmlspecialchars($employee['Salary']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

