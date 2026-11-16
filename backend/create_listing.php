<?php
require __DIR__ . '/config.php';
$id=require_login();
if ($_SERVER['REQUEST_METHOD']!=='POST') json_response(['message'=>'Method not allowed'],405);
$make=trim($_POST['make']??'');$model=trim($_POST['model']??'');$year=(int)($_POST['year']??0);
$type=trim($_POST['type']??'');$price=(float)($_POST['price']??0);$currency=trim($_POST['currency']??'USD');
$country=trim($_POST['country']??'');$description=trim($_POST['description']??'');
$allowed=['USD','GHS','EUR','GBP','CAD'];
if (!$make||!$model||$year<1950||$year>2035||!$type||$price<=0||!in_array($currency,$allowed,true)||!$country) json_response(['message'=>'Please complete all required fields with valid values.'],422);
$stmt=$pdo->prepare('INSERT INTO listings (user_id,make,model,year,vehicle_type,price,currency,country,description,status) VALUES (?,?,?,?,?,?,?,?,?,?)');
$stmt->execute([$id,$make,$model,$year,$type,$price,$currency,$country,$description,'Pending review']);
json_response(['message'=>'Listing submitted']);
