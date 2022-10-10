<?php

// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../inc/functions.php';
logged_only();

require_once '../inc/db.php';

// Afficher article du User // 

$getAllMyArticles = $db->prepare('SELECT * FROM `articles` WHERE `users_idUser` = ? ORDER BY `idArticle` DESC');
$getAllMyArticles->execute([$_SESSION['auth']->idUser]);
$articles = $getAllMyArticles->fetchAll();
?>