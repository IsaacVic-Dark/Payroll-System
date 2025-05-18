<?php 

require 'C:\laragon\www\payroll_system\db\db.php';
function getEmployeeLeaves($pdo, $employeeId) {
    $stmt = $pdo->prepare("SELECT * FROM leaves WHERE EmployeeID = :id");
    $stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function alterLeaves($pdo, $leaveId, $newStatus) {
    $stmt = $pdo->prepare("UPDATE leaves SET Status = :status WHERE LeaveID = :id");
    $stmt->bindParam(':status', $newStatus, PDO::PARAM_STR);
    $stmt->bindParam(':id', $leaveId, PDO::PARAM_INT);
    $stmt->execute();
}

