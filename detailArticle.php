<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

require_once 'php/functions.php';

if (isset($_GET['id_article'])) {
    $id_article = $_GET['id_article'];
    $article = loadDetailArticle($id_article);
    if ($article) {
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Vos bonnes pratiques éco-responsables : partagez-les entre vous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>Vos bonnes pratiques en détail</title>
    </head>
    <body>
        <?php require_once 'header.php'; ?>

        <main>
            <h1>Vos bonnes pratiques en détail</h1>
            
            <h2><?= $article['titre'] ?></h2>

            <p><?= $article['description'] ?></p>

            <p><?= $article['login'] ?></p>

            <p><?= $article['date_article'] ?></p>
            

        </main>
    </body>
</html>

<?php

    } else {
        echo "Article non trouvé.";
        exit;
    }
} else {
    echo "ID de l'article manquant.";
    exit;
}


?>

