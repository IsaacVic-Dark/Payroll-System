<?php 

require_once __DIR__ . '../../../middleware/check_auth.php';

echo "<h2>Home Page</h2>";

require __DIR__ . '../../../db/db.php';

$countEmployees = $pdo->query("SELECT COUNT(*) FROM employees")->fetchColumn();
$countLeaves = $pdo->query("SELECT COUNT(*) FROM leaves")->fetchColumn();

include __DIR__ . '../../components/nav.php';

// print_r($_SESSION['user']);

?>



<h2>Welcome, <?= htmlspecialchars($_SESSION['user']['FirstName']) ?>!</h2>
<h4>Employees: <?=$countEmployees?></h4>
<h4>Leave applications: <?=$countLeaves?></h4>
