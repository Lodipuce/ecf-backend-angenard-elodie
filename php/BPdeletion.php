<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'functions.php';

$db = getDbConnection();

$query = $db->prepare('DELETE FROM article WHERE id_article = :id_article');
var_dump($query);
$query->execute([
    "id_article" => $_GET['id_article'],
]);


if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
    header('Location: ../accueilEditeur.php');
} elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    header('Location: ../accueilAdmin.php');
}