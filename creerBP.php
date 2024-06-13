<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Vos bonnes pratiques éco-responsables. Administration : ajouter, modifier ou supprimer les publications.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>Administrateur, accueil</title>
    </head>
    
    <body>
        <?php require_once 'header.php'; ?>

        <main>
            <h1>Créer une bonne pratique</h1>

            <form action="php/BPcreation.php" method="post">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre">

                <label for="description">Description</label>
                <input type="textarea" name="description" id="description">

                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date">

                <button type="submit">VALIDER</button>
            </form>

        </main>
    </body>
</html>