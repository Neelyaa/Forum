
<?php
 require '../inc/head.php';
 require '../action/usereditaction.php';
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

<h2>Modifier votre article</h2>


<!-- Formulaire Modif Article -->
<div class="containerarti">

<form action="" method="post">
    <div class="champ-formarti">
     <label for="title" class="form_lab">Titre : </label>
     <input class="form_lab" name="title" value="<?= $articleInfo->titre; ?>">
    </div>

    <div class="champ-formarti">
     <label for="content" class="form_lab">Description : </label>
     <textarea class="form_lab" name="content" ><?= $articleInfo->article;?></textarea>
    </div>
    <div class="button">
    <input type="submit" name="valid" value="Modifier" id="valid" class="modif">
    <input type="submit" name="delete" value="Supprimer" id="delete" class="delete">
</div>
</form>

</div>
<?php require '../inc/footer.php'; ?>