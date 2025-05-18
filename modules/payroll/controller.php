<?php 

require_once 'C:\laragon\www\payroll_system\db\db.php';

// function getPayroll(){
//     $stmt = $pdo->prepare("SELECT * FROM payroll");
//     $stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);
//     $stmt->execute();
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

// function getPayrollByID($pdo, $employeeId){
//     $stmt = $pdo->prepare("SELECT PaymentStatus FROM payroll WHERE EmployeeID = :id");
//     $stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);
//     $stmt->execute();
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }