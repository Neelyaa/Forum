<?php

// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../inc/functions.php';
logged_only();
if(!empty($_POST)){

    if(empty($_POST['mdp']) || $_POST['mdp'] != $_POST['mdp2']){
        $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
    }else{
        $user_id = $_SESSION['auth']->id;
        $mdpCrypt= password_hash($_POST['mdp'], PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $db->prepare('UPDATE `users` SET `password` = ? WHERE `id` = ?')->execute([$mdpCrypt, $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
        
    }

}