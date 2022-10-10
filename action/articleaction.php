<?php

// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once '../inc/functions.php';
logged_only();

require_once '../inc/db.php' ;

// Afficher tout les articles //

$getAllArticles = $db->prepare('SELECT * FROM `articles` WHERE `idArticle` ORDER BY `idArticle` DESC');
$getAllArticles->execute();
$Allarticles = $getAllArticles->fetchAll();


// Créer un article // 

if(isset($_POST['valid'])){



if(!empty($_POST['title']) AND (!empty($_POST['content']))){

$title = htmlspecialchars($_POST['title']);
$content = nl2br(htmlspecialchars($_POST['content']));
$date = date("Y-m-d H:i:s");
$article_id_user = $_SESSION['auth']->idUser;
$article_user_pseudo = $_SESSION['auth']->user_name;

$articleinsert = $db->prepare('INSERT INTO `articles` SET `titre` = ?, `article` = ?, `date_publi` = ?, `users_idUser` = ?, `pseudo` = ?');

$articleinsert->execute([$title, $content, $date, $article_id_user, $article_user_pseudo]);

$_SESSION['flash']['success'] = " Votre article a était publié ! ";
}
else{
$erreur['title'] = " Veuillez donnez un titre a l'article ";
$erreur['content'] = ' Le contenu ne peut être vide ';
}
}


?>
