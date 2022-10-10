<?php

// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once '../inc/functions.php';
logged_only();

require_once '../inc/db.php' ;

// Afficher les membres //

$getAllUsers = $db->prepare('SELECT * FROM `users` ORDER BY `idUser` DESC');
$getAllUsers->execute();
$AllUsers = $getAllUsers->fetchAll();