<?php
require __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_response(['message'=>'Method not allowed'],405);
$email=strtolower(trim($_POST['email'] ?? ''));
$password=$_POST['password'] ?? '';
$stmt=$pdo->prepare('SELECT id,password_hash FROM users WHERE email=? LIMIT 1');
$stmt->execute([$email]);$user=$stmt->fetch();
if (!$user || !password_verify($password,$user['password_hash'])) json_response(['message'=>'Incorrect email or password.'],401);
session_regenerate_id(true);
$_SESSION['user_id']=(int)$user['id'];
json_response(['message'=>'Logged in']);
