<?php 
echo "<h1>Employees</h1>";

// Include database functions
require 'C:\laragon\www\payroll_system\modules\employees\show.php';

$employees = [];

// ✅ Check if a search term is provided and not empty
if (isset($_GET['search']) && strlen(trim($_GET['search'])) > 0) {
    $search = trim($_GET['search']);

    // ✅ If numeric, search by ID
    if (is_numeric($search)) {
        $employee = fetchEmployeeById($pdo, (int)$search);
        if ($employee) {
            $employees[] = $employee; // Wrap single result in array
        }
    } else {
        // ✅ Otherwise, search by name
        $employees = fetchEmployeeByName($pdo, $search);
    }
} else {
    // ✅ If no search, show all employees
    $employees = fetchAllEmployees($pdo);
}
?>

<!-- ✅ The search form -->
<form action="employees.php" method="GET">
    <input type="text" name="search" placeholder="Search by name or ID" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- ✅ Employee Table -->
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>First Name</th>
        <th>Job Title</th>
        <th>Salary</th>
    </tr>

    <?php if (!empty($employees)): ?>
        <?php foreach ($employees as $employee): ?>
            <tr onclick="window.location='employee_profile.php?id=<?= $employee['EmployeeID'] ?>'" style="cursor: pointer;">
                <td><?= htmlspecialchars($employee['FirstName']) ?></td>
                <td><?= htmlspecialchars($employee['JobTitle']) ?></td>
                <td><?= htmlspecialchars($employee['Salary']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">No matching employees found.</td>
        </tr>
    <?php endif; ?>
</table>
