<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




// Connexion à la BDD

function getDbConnection() {
    static $db = null;
    $host = 'localhost';
    $dbname = 'bpecoresponsables';
    $user = 'root';
    $pass = '';

    if ($db === null) {
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }
    return $db;
}



// accueil général

function show3LastArticles() {
    $db = getDbConnection();
    $query = $db->prepare('SELECT * 
                        FROM article INNER JOIN utilisateur ON article.id_user = utilisateur.id_user
                        ORDER BY date_article 
                        DESC LIMIT 3');
    $query->execute();
    $articles = $query->fetchAll();

    foreach ($articles as $article) {
        echo ('<div>
                    <h2>'.$article['titre'].'</h2>
                    <p>'.$article['description'].'</p>
                    <p>Publié par '.$article['login'].'</p>
                    <p>'.$article['date_article'].'</p>
                    <a href="">LIRE</a>
                </div>');
    }
}


// quand Editeur connecté

function showMyArticles() {
    $db = getDbConnection();
    $query = $db->prepare('SELECT * FROM article WHERE id_user = '.$_SESSION['id_user'].'');
    $query->execute();
    $articles = $query->fetchAll();
    return $articles;
}


    // Modifier un article
        // Lien
        function LinkToModify() {
            $articles = showMyArticles();
            foreach ($articles as $article) {
                echo '<a href="modifierArticle.php?id_article='.$article['id_article'].'">'.$article['titre'].'</a> <br>';
            }
        }

        // Charger les informations
        function LoadArticle() {
            $db = getDbConnection();
            $query = $db->query('SELECT * FROM article WHERE id_article = :id_article');
            $query->execute([
                "id_article" => $_GET['id_article'],
            ]);
            $article = $query->fetch(PDO::FETCH_ASSOC);
        }



    // Supprimer un article
        // Lien
        function LinkToDelete() {
            $articles = showMyArticles();
            foreach ($articles as $article) {
                echo '<a href="supprimerArticle.php?id_article='.$article['id_article'].'">'.$article['titre'].'</a> <br>';
            }
        }



// quand Admin connecté

function ShowAllArticles() {
    $db = getDbConnection();
    $query = $db->prepare('SELECT * FROM article ORDER BY date_article DESC');
    $query->execute();
    $articles = $query->fetchAll();
    return $articles;
} 

        // Modifier un article
            // Lien
            function LinkToModifyAdmin() {
                $articles = ShowAllArticles();
                foreach ($articles as $article) {
                    echo '<a href="modifierArticle.php?id_article='.$article['id_article'].'">'.$article['titre'].'</a> <br>';
                }
            }

        

        // Supprimer un article
            // Lien
            function LinkToDeleteAdmin() {
                $articles = ShowAllArticles();
                foreach ($articles as $article) {
                    echo '<a href="supprimerArticle.php?id_article='.$article['id_article'].'">'.$article['titre'].'</a> <br>';
                }
            }