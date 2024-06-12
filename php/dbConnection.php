<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO(
        'mysql:host=localhost;dbname=bpecoresponsables;charset=utf8',
        'root',
        '',
    );
    echo "connexion à la BDD";
}
catch (Exception $e) {
    exit('<strong>Error:</strong>'.$e->getMessage());
}

?>