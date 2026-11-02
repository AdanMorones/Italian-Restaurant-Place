<?php
// db.php - Database connection helper
$host = '127.0.0.1';
$db   = 'restaurant_db';
$user = 'root';
$pass = 'root'; // Default password for MAMP MySQL is 'root'
$port = 8889;   // Check MAMP preferences if default MySQL port is 8889 or 3306
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>