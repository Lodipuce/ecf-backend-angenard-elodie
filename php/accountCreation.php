<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('php/dbConnection.php');

if (!isset($_POST['create_login']) || !isset($_POST['email']) || !isset($_POST['create_password']) 
    && empty($_POST['create_login']) || empty($_POST['email']) || empty($_POST['create_password']) ) {
    die('Le login, l\'e-mail et le mot de passe sont nécessaires pour créer un compte.');
}


$login = strip_tags($_POST['create_login']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['create_password']);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = $db->prepare('INSERT INTO utilisateur (login,password,email,id_role) VALUES (:login,:password,:email,1)');
$query->execute([
    "login" => $login,
    "password" => $hashedPassword,
    "email" => $email,
]);



