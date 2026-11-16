<?php
require __DIR__ . '/config.php';
$id=require_login();
$stmt=$pdo->prepare('SELECT id,name,email,country,created_at FROM users WHERE id=?');
$stmt->execute([$id]);$user=$stmt->fetch();
if (!$user) json_response(['message'=>'Account not found'],404);
$stmt=$pdo->prepare('SELECT id,make,model,year,price,currency,status FROM listings WHERE user_id=? ORDER BY created_at DESC');
$stmt->execute([$id]);
json_response(['user'=>$user,'listings'=>$stmt->fetchAll()]);
