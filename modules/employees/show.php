<?php

require_once __DIR__ . '../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$port = $_ENV['PORT'];


$dsn = "mysql:host=$host;port=$port;dbname=$dbname;user=$user;password=$pass;charset=utf8mb4";

$pdo = new PDO($dsn);

$stm = $pdo->prepare("SELECT * FROM employees");
$stm->execute();

$employees = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $employee) {
    echo "<h1>{$employee['FirstName']}</h1>";
    echo "<p>{$employee['Email']}</p>";
    echo "<hr>";
}
