<?php

$path = '../resources/layouts/employees.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['page'] == 'home'){
        header('Location: /resources/layouts/index.php');
        exit;
    } elseif ($_POST['page'] == 'employees') {
        header("Location: /resources/layouts/employees.php");
        exit;
    } elseif ($_POST['page'] == 'leaves'){
        header("Location: /resources/layouts/leaves.php");
        exit;
    } else { 
        echo "Page not found";
    }
}
