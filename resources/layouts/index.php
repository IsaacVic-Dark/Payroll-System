<?php 
echo "<h2>Home Page</h2>";

require __DIR__ . '../../../db/db.php';

$countEmployees = $pdo->query("SELECT COUNT(*) FROM employees")->fetchColumn();
$countLeaves = $pdo->query("SELECT COUNT(*) FROM leaves")->fetchColumn();

include __DIR__ . '../../components/nav.php';

?>


<h1>Employees: <?=$countEmployees?></h1>
<h1>Leave applications: <?=$countLeaves?></h1>
