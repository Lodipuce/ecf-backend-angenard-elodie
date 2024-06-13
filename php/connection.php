<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'dbConnection.php';


if (!isset($_POST['connect_login']) || !isset($_POST['connect_password']) && empty($_POST['connect_login']) || empty($_POST['connect_password'])) {
    die('<strong>Le pseudonyme ou le mail et le mot de passe sont nécessaires pour se connecter.</strong>');
}


$login = strip_tags($_POST['connect_login']);
$password = strip_tags($_POST['connect_password']);

$query = $db->prepare('SELECT * FROM utilisateur WHERE login = :login');
$query->execute([
    "login" => $login,
]);
$users = $query->fetchAll();

foreach ($users as $user) {
    $checkPassword = password_verify($password, $user['password']);
    if ($login === $user['login'] && $checkPassword === true) {
        $_SESSION['id_user']= $user['id_user'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['role'] = $user['id_role'];

        if ($user['id_role'] == 2) {
            header('Location: ../accueilEditeur.php');
        } elseif ($user['id_role'] == 1) {
            header('Location: ../accueilAdmin.php');
        }
 
    } 
    else {
        die('Error');
    }
}