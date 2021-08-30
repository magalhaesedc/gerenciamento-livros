<?php 

$host = "localhost";
$user = "postgres";
$password = "postgres";
$db = "techlead";
$port = "5433";

$driver = "pgsql:host=".$host.";port=".$port.";dbname=".$db;

$pdo = new PDO($driver, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>