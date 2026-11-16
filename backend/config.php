<?php
declare(strict_types=1);
session_start();
header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$db   = 'autovex';
$user = 'root';
$pass = ''; // Set your local MySQL password here if you use one.

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$db};charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES => false]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Database connection failed. Check backend/config.php and import database.sql.']);
    exit;
}

function json_response(array $data, int $status = 200): never {
    http_response_code($status);
    echo json_encode($data);
    exit;
}
function require_login(): int {
    if (empty($_SESSION['user_id'])) json_response(['message' => 'Please log in first.'], 401);
    return (int) $_SESSION['user_id'];
}
