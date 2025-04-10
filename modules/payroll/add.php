<?php

// require '/db/db.php';
require '../../db/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Payroll = [
        1, '2024-03-01', '2024-03-31', 50000.00, 5, 2500.00, 1000.00, 500.00, 'Paid', '2024-04-01'
    ];
    $stm = $pdo->prepare("INSERT INTO Payroll (EmployeeID, PayPeriodStart, PayPeriodEnd, BaseSalary, OvertimeHours, OvertimePay, Bonuses, Deductions, PaymentStatus, PaymentDate)
    VALUES (?,?,?,?,?,?,?,?,?,?);");
    $stm->execute($Payroll);
    header("Location: /");
    exit;
}
