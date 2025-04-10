<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll system</title>
</head>
<body>  
    
    <form method="POST" action="routes/api.php">
        <button type="submit" name="action" value="add_employee">Add employee</button>
        <button type="submit" name="action" value="add_payroll">Add payroll</button>
    </form>
</body>
</html>
<?php

// require './modules/employees/show.php';

echo "<h1>Welcome to Payroll Managment System</h1>";