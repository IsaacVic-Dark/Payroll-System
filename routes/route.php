<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = $_POST['page'] ?? '';

    if ($page === 'logout') {
        require_once __DIR__ . '/../resources/pages/auth/logout.php';
        exit;
    }

    require_once __DIR__ . '../../middleware/check_auth.php';

    if ($page === 'home') {
        header('Location: /resources/layouts/index.php');
        exit;
    } elseif ($page === 'employees') {
        header("Location: /resources/layouts/employees.php");
        exit;
    } elseif ($page === 'leaves') {
        header("Location: /resources/layouts/leaves.php");
        exit;
    } else {
        echo "Page not found";
    }
}
