<?php

echo"<h2>Leave Managment</h2>";

require __DIR__ . '../../../modules/leave/controller.php';
require __DIR__ . '../../../modules/employees/controller.php';

include __DIR__ . '../../components/nav.php';

$leaves = fetchAllLeaves($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['leave_id'])) {
    $leaveId = (int)$_POST['leave_id'];
    $status = $_POST['action']; 

    alterLeaves($pdo, $leaveId, $status);

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

[$leaves, $totalPages, $currentPage] = fetchAllLeaves($pdo);

?>



<form action="" method="POST">
    <input type="text" name="name" placeholder="Enter employee name">
    <select name="month" id="month">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <input type="number" placeholder="Enter year" name="year" min="2000" max="2100">
    <button type="submit">Search</button>
</form>


<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Leave Type</th>
        <th>StartDate</th>
        <th>EndDate</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    
    <?php if (!empty($leaves)): ?>
        <?php foreach ($leaves as $leave): ?>
            <tr onclick="window.location='employee_profile.php?id=<?= $leave['EmployeeID'] ?>'" style="cursor: pointer;">
                <td><?= htmlspecialchars($leave['FirstName'] . ' ' . $leave['LastName']) ?></td>
                <td><?= htmlspecialchars($leave['LeaveType']) ?></td>
                <td><?= htmlspecialchars($leave['StartDate']) ?></td>
                <td><?= htmlspecialchars($leave['EndDate']) ?></td>
                <td><?= htmlspecialchars($leave['Status']) ?></td>
                <td style="display: flex; gap: 10px;">
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="leave_id" value="<?= htmlspecialchars($leave['LeaveID']) ?>">
                        <button type="submit" name="action" value="Approved">Approve</button>
                        <button type="submit" name="action" value="Rejected">Reject</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
        <tr>
            <td colspan="3">No matching leaves found.</td>
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