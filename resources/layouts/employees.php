<?php 
echo "<h1>Employees</h1>";

require __DIR__ . '../../../modules/employees/controller.php';

$employees = [];

if (isset($_GET['search']) && strlen(trim($_GET['search'])) > 0) {
    $search = trim($_GET['search']);

    if (is_numeric($search)) {
        $employee = fetchEmployeeById($pdo, (int)$search);
        if ($employee) {
            $employees[] = $employee; 
        }
    } else {
        $employees = fetchEmployeeByName($pdo, $search);
    }
} else {
    [$employees, $totalPages, $currentPage] = fetchAllEmployees($pdo);

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        deleteEmployeeByID($pdo, $id);
        header("Location: employees.php");
        exit();
    } elseif(isset($_POST['action']) && $_POST['action'] == 'add'){
        header('Location: add_employee.php');
        exit();
    }elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
        $employeeId = $_POST['id'];
        header("Location: edit_employee.php?id=$employeeId");
        exit();
    }
}
?>

<form action="employees.php" method="GET">
    <input type="text" name="search" placeholder="Search by name or ID" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>
<form action="employees.php" method="POST">
    <button type="submit" name="action" value="add">Add an employee</button>
</form>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>First Name</th>
        <th>Job Title</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>
    
    <?php if (!empty($employees)): ?>
        <?php foreach ($employees as $employee): ?>
            <tr onclick="window.location='employee_profile.php?id=<?= $employee['EmployeeID'] ?>'" style="cursor: pointer;">
                <td><?= htmlspecialchars($employee['FirstName']) ?></td>
                <td><?= htmlspecialchars($employee['JobTitle']) ?></td>
                <td><?= htmlspecialchars($employee['Department']) ?></td>
                <td><?= htmlspecialchars($employee['Salary']) ?></td>
                <td style="display: flex; gap: 10px;">
                    <form action="employees.php" method="POST">
                        <input type="text" name="id" value="<?= $employee['EmployeeID'] ?>" hidden>
                        <button type="submit" name="action" value="edit">Edit</button>
                    </form>
                    <form action="employees.php" method="POST">
                        <input type="text" name="id" value="<?= $employee['EmployeeID'] ?>" hidden>
                        <button type="submit" name="action" value="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
        <tr>
            <td colspan="3">No matching employees found.</td>
        </tr>
    <?php endif; ?>
</table>

<!-- Pagination Links -->
<div style="margin-top:20px;">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" style="margin: 0 5px; <?= $i === $page ? 'font-weight: bold;' : '' ?>">
            <?= $i ?>
        </a>
        <?php endfor; ?>
    </div>
