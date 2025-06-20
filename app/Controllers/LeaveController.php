<?php 

require __DIR__ . '/../../database/db.php';

require_once __DIR__ . '../../../core/helper.php';


/**
 * Leave controller
 * Summary of fetchAllLeaves
 * @param mixed $pdo
 * @return array
 */


function fetchAllLeaves($pdo) {
    $pagination = PaginationHelper::getPagination([
        'pdo' => $pdo,
        'table' => 'leaves',
        'limit' => 5, 
    ]);

    $stmt = $pdo->prepare("SELECT l.*, e.FirstName, e.LastName 
                           FROM leaves AS l 
                           JOIN employees AS e ON l.EmployeeID = e.EmployeeID 
                           LIMIT :limit OFFSET :offset");
    
    $stmt->bindValue(':limit', $pagination['limit'], PDO::PARAM_INT);
    $stmt->bindValue(':offset', $pagination['offset'], PDO::PARAM_INT);
    $stmt->execute();
    
    $leaves = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [$leaves, $pagination['totalPages'], $pagination['page']];
}



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

function checkLeaveStatus($pdo, $id) {
    $stmt = $pdo->prepare("SELECT Status FROM leaves WHERE EmployeeID = :id ORDER BY LeaveID DESC LIMIT 1");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $status = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$status) {
        return "No leave application found.";
    }

    switch ($status['Status']) {
        case 'Pending':
            return "Leave application is awaiting HR action.";
        case 'aAccepted':
            return "Your leave application has been accepted.";
        case 'Rejected':
            return "Your leave application has been rejected.";
        default:
            return "Unknown leave status.";
    }
}

