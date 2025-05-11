<?php 
echo "<h1>Home Page</h1>";
?>

<form action="/routes/route.php" method="POST">
    <button type="submit" name="page" value="home">Home</button>
    <button type="submit" name="page" value="employees">Employees</button>
</form>
