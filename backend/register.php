<?php
require __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['message'=>'Method not allowed'],405);
$name = trim($_POST['name'] ?? '');
$email = strtolower(trim($_POST['email'] ?? ''));
$country = trim($_POST['country'] ?? '');
$password = $_POST['password'] ?? '';
if (mb_strlen($name) < 2 || !filter_var($email,FILTER_VALIDATE_EMAIL) || $country === '' || strlen($password) < 8) {
    json_response(['message'=>'Enter a valid name, email, country and password of at least 8 characters.'],422);
}
try {
    $stmt=$pdo->prepare('INSERT INTO users (name,email,country,password_hash) VALUES (?,?,?,?)');
    $stmt->execute([$name,$email,$country,password_hash($password,PASSWORD_DEFAULT)]);
    session_regenerate_id(true);
    $_SESSION['user_id']=(int)$pdo->lastInsertId();
    json_response(['message'=>'Account created']);
} catch (PDOException $e) {
    if ($e->getCode()==='23000') json_response(['message'=>'An account with this email already exists.'],409);
    json_response(['message'=>'Could not create account. Please try again.'],500);
}
