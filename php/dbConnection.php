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
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

?>