<?php

// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../inc/functions.php';

logged_only();

if (!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
    require_once '../inc/db.php';
    $req = $db->prepare('SELECT * FROM `users` WHERE (`user_name` = :username OR email = :username)');
    $req->execute(['username' => $_POST['pseudo']]);  
    $user = $req->fetch();
  
    if ($user && password_verify($_POST['mdp'], $user->password )) {
        if ( $user->role === 'admin') {
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';

            header('Location: ../vue/admin.php');
            exit();
        }else {
            header('Location: ../vue/account.php');
            exit();
        }
    }else {
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
    
}
