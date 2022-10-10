<?php
// Connection base de données //

 $db = new PDO('mysql:dbname=forum;host=localhost', 'root', 'root');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Erreurs SQL transformé en erreurs PHP
 $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Mode de récupération
 