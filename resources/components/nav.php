<?php
require __DIR__ . '../../../routes/route.php';
?>
<form action="/routes/route.php" method="POST">
    <button type="submit" name="page" value="home">Home</button>
    <button type="submit" name="page" value="employees">Employees</button>
    <button type="submit" name="page" value="leaves">Leaves</button>
</form>