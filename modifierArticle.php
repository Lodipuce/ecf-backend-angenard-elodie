<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'php/functions.php';

if (isset($_GET['id_article'])) {
    $id_article = $_GET['id_article'];
    $article = loadArticle($id_article);
    if ($article) {
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Vos bonnes pratiques éco-responsables. Administration : ajouter, modifier ou supprimer les publications.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>Modifier un article</title>
    </head>
    
    <body>
        <?php require_once 'header.php'; ?>

        <main>
            <h1>Modifier une bonne pratique</h1>

            <form action="php/BPupdate.php" method="post">
                <input type="hidden" name="id_article" value="<?= $article['id_article'] ?>">

                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" value="<?= $article['titre'] ?>">

                <label for="description">Description</label>
                <input type="textarea" name="description" id="description" value="<?= $article['description'] ?>">

                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" value="<?= $article['date_article'] ?>">

                <button type="submit">METTRE A JOUR</button>
            </form>

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

