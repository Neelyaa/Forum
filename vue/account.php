<?php
require '../inc/head.php';
require '../action/accountaction.php';
?>

<!-- Page Profil avec modification mot de passe -->

<!-- Navbar -->
<aside class="sidebar">
    <nav class="nav">
      <ul>
        <li><a href="userarticle.php">Mes articles</a></li>
        <li><a href="article.php">Articles</a></li>
        </ul>
    </nav>
  </aside>
<!-- Navbar -->

<h2>Bonjour <?= $_SESSION['auth']->user_name; ?></h2>

<?php if ($_SESSION['auth']->avatar) {
 
 $avatar=$_SESSION['auth']->avatar;

} 
?>

<div class="myavatar">
  <img src="../avatars/<?= $avatar; ?>" class="avatar" alt="avatar">
</div>

<div class="containeracc">
<form action="" method="post">
    <div class="champ-form">
        <input class="form_in" type="password" name="mdp" placeholder="Changer de mot de passe"/>
    </div>
    <div class="champ-form">
        <input class="form_in" type="password" name="mdp2" placeholder="Confirmation du mot de passe"/>
    </div>
    <input type="submit" name="valid" value="Ok" id="valid" class="valide">
</form>
<div class="signout">
<a href="logout.php">Se déconnecter</a>
</div>
</div>
<?php require '../inc/footer.php'; ?>