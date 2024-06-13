<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'bpecoresponsables';
$user = 'root';
$pass = '';

try {
    $db = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass
    );
}
catch (PDOException $e) {
    exit('<strong>Error:</strong>'.$e->getMessage());
}

?>