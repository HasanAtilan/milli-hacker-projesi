<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'csvt';
mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");
try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Bağlantı sağlanamadı: " . $e->getMessage());
}