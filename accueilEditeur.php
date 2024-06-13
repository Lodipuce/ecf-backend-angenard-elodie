<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Vos bonnes pratiques éco-responsables. Administration de votre compte Editeur : ajouter, modifier ou supprimer vos propres publications">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>Editeur, accueil</title>
    </head>

    <body>
        <?php require_once 'header.php'; 
        require_once  'php/functions.php';
        ?>

        <main>
            <h1>Editeur, accueil</h1>
            
            <section>
                <a href="creerBP.php">Créer une nouvelle pratique</a>
            </section>

            <section>
                <h2>Modifier une pratique :</h2>
                <?php LinkToModify(); ?>
            </section>

            <section>
                <h2>Supprimer une pratique :</h2>
                <?php LinkToDelete(); ?>
            </section>

            <hr>

            <section>
                Modifier votre mot de passe
            </section>

            <section>
                Modifier votre profil
            </section>

        </main>
    </body>
</html>