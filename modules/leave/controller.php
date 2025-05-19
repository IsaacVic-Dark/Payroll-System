<?php 

require 'C:\laragon\www\payroll_system\db\db.php';

/**
 * Admin leave controller
 * Summary of getEmployeeLeaves
 * @param mixed $pdo
 * @param mixed $employeeId
 */
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


/**
 * Employee profile controller
 * Summary of applyLeaveByID
 * @param mixed $pdo
 * @param mixed $leaveApplication
 * @return void
 */
function applyLeaveByID($pdo, $leaveApplication){
    $stmt = $pdo->prepare("INSERT INTO leaves (
            EmployeeID, LeaveType, StartDate, EndDate, Status
        ) VALUES (
            :EmployeeID, :LeaveType, :StartDate, :EndDate, :Status
        )");

    $stmt->execute([
        ':EmployeeID' => $leaveApplication['id'],
        ':LeaveType' => $leaveApplication['LeaveType'],
        ':StartDate' => $leaveApplication['StartDate'],
        ':EndDate' => $leaveApplication['EndDate'],
        ':Status' => $leaveApplication['Status'],
    ]);

}
