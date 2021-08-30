<?php 

$host = "localhost";
$user = "postgres";
$password = "postgres";
$db = "techlead";
$driver = "pgsql:host=".$host.";port=5433;dbname=".$db;

$pdo = new PDO($driver, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>