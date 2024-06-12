<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Vos bonnes pratiques éco-responsables : partagez-les entre vous. Page de connexion.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>Vos bonnes pratiques, connexion</title>
    </head>

    <body>
        <?php require_once 'header.php'; ?>

        <h1>Se connecter</h1>
        
        <form action="./php/connection.php" method="post">
            <label for="connect_login">Login</label>
            <input type="text" name="connect_login" id="connect_login" autocomplete="username">

            <label for="connect_password">Pass</label>
            <input type="password" name="connect_password" id="connect_password" autocomplete="current-password">

            <input type="button" value="VALIDER">
        </form>
        
        <hr>

        <h2>Créer un compte</h2>

        <form action="php/accountCreation.php" method="post">
            <label for="create_login">Login</label>
            <input type="text" name="create_login" id="create_login" autocomplete="username">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="create_password">Pass</label>
            <input type="password" name="create_password" id="create_password" autocomplete="current-password">

            <input type="button" value="VALIDER">
        </form>

    </body>
</html>