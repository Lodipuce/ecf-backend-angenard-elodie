<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'functions.php';

$db = getDbConnection();

$titre = strip_tags($_POST['titre']);
$description = strip_tags($_POST['description']);
$date = strip_tags($_POST['date']);
$id_article = strip_tags($_POST['id_article']);

$query = $db->prepare('UPDATE article SET titre = :titre, description = :description, date_article = :date WHERE id_article = :id_article');
$query->execute([
    "titre" => $titre,
    "description" => $description,
    "date" => $date,
    "id_article" => $id_article,
]);

if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
    header('Location: ../accueilEditeur.php');
} elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    header('Location: ../accueilAdmin.php');
}