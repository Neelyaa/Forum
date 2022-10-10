<?php


// Affichage erreurs //
error_reporting(E_ALL);
ini_set("display_errors", 1);


require_once 'inc/functions.php';
logged_only();

require_once 'inc/db.php';

// Affichage article par ID //
$GetArticle = $_GET['id'];

$ShowArticle = $db->prepare('SELECT * FROM `articles` WHERE `idArticle` = ?');
$ShowArticle->execute([$GetArticle]);
$ArticleContent = $ShowArticle->fetch();


// Créer un commentaire // 

if(isset($_POST['valid'])){



  if(!empty($_POST['content'])){
  
  $content = nl2br(htmlspecialchars($_POST['content']));
  $date = date("Y-m-d H:i:s");
  $com_user = $_SESSION['auth']->idUser;
  $com_pseudo = $_SESSION['auth']->user_name;
  $com_id = $GetArticle;

  $commentinsert = $db->prepare('INSERT INTO `comments` SET `content` = ?, `date_post` = ?, `users_idUser` = ?, `pseudo` = ?, `articles_idArticle` = ?');
  
  $commentinsert->execute([$content, $date, $com_user, $com_pseudo, $com_id]);
  
  $_SESSION['flash']['success'] = " Votre commentaire a était publié ! ";
  }
  else{
  $erreur['content'] = ' Le contenu ne peut être vide ';
  }
  }

  // Afficher tout les commentaires // 

$GetCom = $_GET['id'];

$getAllComs = $db->prepare('SELECT * FROM `comments` WHERE `articles_idArticle` = ? ORDER BY `idCom` DESC');
$getAllComs->execute([$GetCom]);
$Comments = $getAllComs->fetchAll();


?>

<?php require 'inc/head.php' ?>

<!-- NavBar -->
<aside class="sidebar">
    <nav class="nav">
      <ul>
        <li><a href="account.php"><img class="profil" src="img/icons8-aseprite-64.png"> Profil</a></li>
        <li><a href="userarticle.php">Mes articles</a></li>
        <li><a href="article.php">Articles</a></li>
        </ul>
    </nav>
  </aside>
  <!-- NavBar -->

<!-- Article selectionné -->
  <div class="contain"> 

    <div class="titre">
    <?= $ArticleContent->titre; ?>
      </div>

    <div class="article">
      <p><?= $ArticleContent->article; ?></p> 
    </div>

    <div class="auteur">
      <p>Crée par : <?= $ArticleContent->pseudo; ?> </p>
      <p>Posté le : <?= $ArticleContent->date_publi; ?> </p>
     </div>

   </div>
   <!-- ---- -->

   <h2>Commentaires</h2>

<!-- Affichage commentaires -->

<?php
foreach($Comments as $Comment): 
 ?>
  <div class="containcom"> 

    <div class="com">
    <?= $Comment->content; ?>
      </div>

    <div class="auteur">
      <p>Ecrit par : <?= $Comment->pseudo; ?></p> 
    </div>

   </div>
  <?php endforeach; ?>
<!--  ---- -->

<!-- Formulaire Post Commentaire -->
<div class="containerpostcom">
<form action="" method="post"> 
   <h3>Ecrire un commentaire </h3>
    <div class="champ-formarti">

    <div class="champ-formarti">
     <label for="content" class="form_lab">Description : </label>
     <textarea class="form_lab" name="content"></textarea>
    </div>
    
    <input type="submit" name="valid" value="Ok" id="valid" class="valide">
</form>
</div>
<?php require '../inc/footer.php'; ?>