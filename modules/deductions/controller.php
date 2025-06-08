<?php 

require_once __DIR__ . "../../../db/db.php";

// Post all deductions
function postDeductions($pdo, $employeeId, $deductionType, $amount, $deductionDate){
        $stmt = $pdo->prepare("INSERT INTO Deductions (EmployeeID, DeductionType, Amount, DeductionDate) 
                               VALUES (:employeeId, :deductionType, :amount, :deductionDate)");

        $stmt->execute([
            ':employeeId' => $employeeId,
            ':deductionType' => $deductionType,
            ':amount' => $amount,
            ':deductionDate' => $deductionDate
        ]);
}

// Fetch all deductions
function fetchAllDeductions($pdo){
    $sql = "SELECT * FROM Deductions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}