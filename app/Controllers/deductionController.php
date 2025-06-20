<?php 

require_once __DIR__ . "/../../db/db.php";
require_once __DIR__ . "tax.php";


// Post all deductions
function postDeductions($params){
    $id = $params['id'];
    $base_salary = $params['salary'];

    $deductions = calculateNetPay($base_salary);


    $stmt = $pdo->prepare("INSERT INTO Deductions (EmployeeID, DeductionType, Amount, DeductionDate) 
                           VALUES (:employeeId, :deductionType, :amount, :deductionDate)");
    
    $stmt->execute([
        ':employeeId' => $deductions,
        ':deductionType' => $deductionType,
        ':amount' => $amount,
        ':deductionDate' => $deductionDate
    ]);

        return [
        'taxPerc' => number_format($taxPerc ),
        'payePerc' => number_format($payePerc ),
        'netPayPerc' => number_format($netPayPerc),
        'basicPay' => number_format($basicSalary),
        'nssf' => number_format($nssf),
        'shif' => number_format($shif),
        'housingLevy' => number_format($housingLevy ),
        'taxableIncome' => number_format($taxableIncome ),
        'taxBeforeRelief' => number_format($tax),
        'personalRelief' => number_format(PERSONAL_RELIEF),
        'paye' => number_format($paye ),
        'netPay' => number_format(floor($netPay * 100 - 0.0001) / 100, 2, '.', ',')
    ];

}

function postDeductions($pdo, $employeeId, $deductionType, $amount, $deductionDate){
}

// Fetch all deductions
function fetchAllDeductions($pdo){
    $sql = "SELECT * FROM Deductions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}