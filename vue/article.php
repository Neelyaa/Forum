<?php
 require '../action/articleaction.php'; 
 require '../inc/head.php';
 ?>

<!-- NavBar -->
<aside class="sidebar">
    <nav class="nav">
      <ul>
        <li><a href="account.php"><img class="profil" src="../img/icons8-aseprite-64.png"> Profil</a></li>
        <li><a href="userarticle.php">Mes articles</a></li>
        <li><a href="article.php">Articles</a></li>
        </ul>
    </nav>
  </aside>
  <!-- NavBar -->

<h2>Article</h2>

<!-- Erreurs -->
<?php if (!empty($erreur)) : ?>
    <div class="showerror">
        <ul>
            <?php foreach ($erreur as $erreur) : ?>
                <li class="error"><?= $erreur; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<!-- Erreurs -->

<!-- Affichage des articles -->
<?php
foreach($Allarticles as $Allarticle): 
 ?>
  <div class="contain"> 

    <div class="titre">
    <?= $Allarticle->titre; ?>
      </div>

    <div class="article">
      <p><?= $Allarticle->article; ?></p> 
    </div>

    <div class="auteur">
      <p>Crée par : <?= $Allarticle->pseudo; ?> </p>
      <p>Posté le : <?= $Allarticle->date_publi; ?> </p>
     </div>
     
     <div class="showarti">  
      <a href="comment.php?id=<?=$Allarticle->idArticle?>">Voir l'article</a>
    </div>
   </div>
 <?php endforeach; ?>
 <!-- ---------------------------- -->

 <!-- Formulaire Post Article -->
<div class="containerpostarti">
<form action="" method="post"> 
   <h3>Creer un article</h3>
    <div class="champ-formarti">
      
     <label for="title" class="form_lab">Titre : </label>
     <input class="form_lab" name="title">
    </div>

    <div class="champ-formarti">
     <label for="content" class="form_lab">Description : </label>
     <textarea class="form_lab" name="content"></textarea>
    </div>
    
    <input type="submit" name="valid" value="Ok" id="valid" class="valide">
</form>
</div>
<?php require '../inc/footer.php'; ?>
