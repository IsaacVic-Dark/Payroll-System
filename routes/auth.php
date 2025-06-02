<?php

require __DIR__ . '../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['auth'] == 'login') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");

    $stmt = $pdo->prepare("SELECT e.FirstName, u.* FROM employees AS e JOIN users AS u ON e.EmployeeID = u.UserID WHERE u.email = :email");

    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['PasswordHash'])) {
            session_start();
            $_SESSION['user'] = $user;
            if($_SESSION['user']['UserType'] === 'user'){              
                header('Location: /resources/layouts/profile_employee.php');
                exit;
            }elseif($_SESSION['user']['UserType'] === 'admin'){
                header('Location: /resources/layouts/index.php');
                exit;
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
