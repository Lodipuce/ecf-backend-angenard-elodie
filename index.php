<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Vos bonnes pratiques éco-responsables : partagez-les entre vous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>Vos bonnes pratiques à la une</title>
    </head>
    <body>
        <?php require_once 'header.php'; ?>

        <main>
            <h1>Vos bonnes pratiques à la une</h1>
            
            <?php
            require_once 'php/functions.php';
            show3LastArticles();
            ?>

        </main>
    </body>
</html>