<?php

// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../inc/functions.php';

session_start();

// Conditions //
if (!empty($_POST['valid'])) {

    // Fichier BDD //
    require_once '../inc/db.php';


    // Conditions Pseudo //

    if (empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])) {

        $erreur['pseudo'] = "Votre pseudo n'est pas valide !";
    } else { // Verifie la BDD //
        $req = $db->prepare('SELECT `idUser` FROM `users` WHERE `user_name` = ?');
        $req->execute([$_POST['pseudo']]);
        $user = $req->fetch();
        if ($user) {   // Si l'utilisateur existe //
            $erreur['pseudo'] = 'Ce pseudo est déjà pris !';
        }
    }
    // Condition Adresse mail //

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erreur['email'] = "Votre email n'est pas valide !";
    } else {
        $req = $db->prepare('SELECT `idUser` FROM `users` WHERE `email` = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user) {
            $erreur['mail'] = 'Cette adresse mail est déjà utilisé pour un autre compte !';
        }
    }

    // Condition mot de passe //
    if (empty($_POST['mdp']) || $_POST['mdp'] != $_POST['mdp2']) {
        $erreur['mdp'] = "Vos mot de passe ne correspondent pas !";
    }


    // Si il n'y a pas d'erreur on enregistre dans la BD //
    if (empty($erreur)) {
        $req = $db->prepare("INSERT INTO `users` SET `user_name` = ?, `password` = ?, `email` = ?, `avatar` = ?, `uploaded_on` = ?");
        $mdpCrypt = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
        // Upload Avatar //
        $targetDir = "avatars/";
        $fileName = basename($_FILES["avatarFile"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $taillemax = 2097152;
        $extension = array('jpg', 'gif', 'png');
        $onUpload = date("Y-m-d H:i:s");

        if(move_uploaded_file($_FILES["avatarFile"]["tmp_name"], $targetFilePath) && $_FILES["avatarFile"]["size"] <= $taillemax ) {
            $insert= $req->execute([$_POST['pseudo'], $mdpCrypt, $_POST['email'], $fileName, $onUpload]);

            if($insert){
               echo  "Le fichier ".$fileName. " à bien était téléchargé.";
            }else{
              echo  "Le téléchargement du fichier a échoué, veuillez réessayer.";
            } 
        }else{
            echo "Désolé, une erreur est survenu durant le téléchargement.";
        }
        
        $user_id = $db->lastInsertId();
    }
}
?>