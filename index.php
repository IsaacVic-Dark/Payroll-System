<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll system</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .payroll-chart {
            height: 200px;
            width: 100%;
            display: flex;
            align-items: flex-end;
        }
        .chart-bar {
            flex: 1;
            margin: 0 4px;
            border-radius: 6px 6px 0 0;
            background: linear-gradient(180deg, #7c3aed 0%, #a78bfa 100%);
        }
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background: #eee;
        }
        .progress-fill {
            height: 100%;
            border-radius: 4px;
        }
    </style>
</head>
<body>  
    
    <?php require 'resources/components/nav.view.php'; ?>

    <!-- <form method="POST" action="routes/api.php">
        <button type="submit" name="action" value="add_employee">Add employee</button>
        <button type="submit" name="action" value="add_payroll">Add payroll</button>
    </form> -->
</body>
</html>
<?php

// require './modules/employees/show.php';

echo "<h1>Welcome to Payroll Managment System</h1>";