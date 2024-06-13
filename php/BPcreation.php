<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'functions.php';
$db = getDbConnection();

$titre = strip_tags($_POST['titre']);
$description = strip_tags($_POST['description']);
$date = strip_tags($_POST['date']);

$query = $db->prepare('INSERT INTO article (titre,description,date_article,id_user) VALUES (:titre,:description,:date,:user)');
$query->execute([
    "titre" => $titre,
    "description" => $description,
    "date" => $date,
    "user" => $_SESSION['id_user'],
]);

