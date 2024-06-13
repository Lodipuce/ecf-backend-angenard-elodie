<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'functions.php';
$db = getDbConnection();

if (!isset($_POST['create_login']) || !isset($_POST['email']) || !isset($_POST['create_password']) 
    && empty($_POST['create_login']) || empty($_POST['email']) || empty($_POST['create_password']) ) {
    die('Le login, l\'e-mail et le mot de passe sont nécessaires pour créer un compte.');
}


$login = strip_tags($_POST['create_login']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['create_password']);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = $db->prepare('INSERT INTO utilisateur (login,password,email,id_role) VALUES (:login,:password,:email,2)');
$query->execute([
    "login" => $login,
    "password" => $hashedPassword,
    "email" => $email,
]);

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
