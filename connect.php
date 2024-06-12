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
            <label for="login">Login</label>
            <input type="text" name="login" id="login">

            <label for="password">Pass</label>
            <input type="password" name="password" id="password">

            <input type="button" value="VALIDER">
        </form>

        <hr>

        <h2>Créer un compte</h2>

        <form action="./php/deconnection.php" method="post">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Pass</label>
            <input type="password" name="password" id="password">

            <input type="button" value="VALIDER">
        </form>

    </body>
</html>