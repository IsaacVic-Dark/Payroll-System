<?php

require 'C:\laragon\www\payroll_system\modules\employees\show.php';
require 'C:\laragon\www\payroll_system\modules\deductions\tax.php';

$employee = fetchEmployeeById($pdo, $_GET['id']);

$deductions = calculateNetPay(basicSalary: $employee['Salary']);

echo "<h1>Employee Profile</h1>";
echo "<p><strong>Name:</strong> " . htmlspecialchars($employee['FirstName']) . "</p>";
echo "<p><strong>Job Title:</strong> " . htmlspecialchars($employee['JobTitle']) . "</p>";
echo "<p><strong>Department:</strong> " . htmlspecialchars($employee['Department']) . "</p>";
echo "<p><strong>Basic Pay:</strong> " . htmlspecialchars($employee['Salary']) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($employee['Email']) . "</p>";
echo "<p><strong>Phone:</strong> " . htmlspecialchars($employee['Phone']) . "</p>";
echo "<p><strong>HireDate:</strong> " . htmlspecialchars($employee['HireDate']) . "</p>";
echo "<p><strong>BankAccountNumber:</strong> " . htmlspecialchars($employee['BankAccountNumber']) . "</p>";

echo "<h2>Deductions</h2>";
echo "<p><strong>NSSF:</strong> " . $deductions['nssf'] . "</p>";
echo "<p><strong>SHIF:</strong> " . $deductions['shif'] . "</p>";
echo "<p><strong>Housing Levy:</strong> " . $deductions['housingLevy'] . "</p>";
echo "<p><strong>Taxable Pay:</strong> " . $deductions['taxableIncome'] . "</p>";
echo "<p><strong>Income Tax:</strong> " . $deductions['taxBeforeRelief'] . "</p>";
echo "<p><strong>Personal Relief:</strong> " . $deductions['personalRelief'] . "</p>";
echo "<p><strong>PAYE:</strong> " . $deductions['paye'] . "</p>";
echo "<p><strong>Net Pay:</strong> " . $deductions['netPay'] . "</p>";
?>
