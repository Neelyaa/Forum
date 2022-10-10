<?php
  require '../action/userarticleaction.php'; 
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

<h2>Mes articles</h2>

<!-- Affichage article User -->

<?php
foreach($articles as $article): 
 ?>
  <div class="contain"> 

    <div class="titre">
    <?= $article->titre; ?>
      </div>

    <div class="article">
      <p><?= $article->article; ?></p> 
    </div>
  
     <div class="edit">  
      <a href="useredit.php?id=<?=$article->idArticle?>">Modifier</a>
    </div>
   </div>
  <?php endforeach; ?>
  <?php require '../inc/footer.php'; ?>


  
  

  