<?php 
echo "<h1>Home Page</h1>";

require __DIR__ . '../../../db/db.php';

$countEmployees = $pdo->query("SELECT COUNT(*) FROM employees")->fetchColumn();
$countLeaves = $pdo->query("SELECT COUNT(*) FROM leaves")->fetchColumn();

?>

<form action="/routes/route.php" method="POST">
    <button type="submit" name="page" value="home">Home</button>
    <button type="submit" name="page" value="employees">Employees</button>
    <button type="submit" name="page" value="leaves">Leaves</button>
</form>

<h1>Employees: <?=$countEmployees?></h1>
<h1>Leave applications: <?=$countLeaves?></h1>
