<?php 
session_start();
$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
header('Location: login.php');