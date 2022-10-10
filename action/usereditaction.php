<?php


// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once '../inc/functions.php';
logged_only();

require_once '../inc/db.php';

// Affichage article par ID //
$GetId = $_GET['id'];

$checkArticle = $db->prepare('SELECT * FROM `articles` WHERE `idArticle` = ?');
$checkArticle->execute([$GetId]);
$articleInfo = $checkArticle->fetch();

// UPDATE Article // 

if(isset($_POST['valid'])){

    if(!empty($_POST['title']) AND !empty($_POST['content'])){
    
$UpdateTitle = htmlspecialchars($_POST['title']);
$UpdateContent = nl2br(htmlspecialchars($_POST['content']));


$UpdateArticle = $db->prepare(' UPDATE `articles` SET `titre` = ?, `article` = ? WHERE `idArticle` = ?'); 
$UpdateArticle->execute([$UpdateTitle, $UpdateContent, $GetId]);

$_SESSION['flash']['success'] = " Votre article a bien était modifié ! ";

    } else {
        $_SESSION['flash']['success'] = " Veuillez remplir tout les champs ! ";
    }
}

// DELETE //

if(isset($_POST['delete'])){
    
$DeleteArticle = $db->prepare(' DELETE FROM `articles` WHERE `idArticle` = ?'); 
$DeleteArticle->execute([$GetId]);

$_SESSION['flash']['success'] = " Votre article a bien était supprimé! ";

    } 


?>
