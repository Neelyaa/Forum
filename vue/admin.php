<?php

require '../action/membresaction.php';
require '../inc/head.php'; ?>

<h2> Espace Administration <img src="../img/icons8-epée-minecraft-48.png"></h2>

<h3>Bonjour <?= $_SESSION['auth']->user_name; ?></h3>

<?php if ($_SESSION['auth']->avatar) {
 
 $avatar=$_SESSION['auth']->avatar;
} 
?>

<div class="adminavatar">
  <img src="../avatars/<?= $avatar; ?>" class="avatarAP" alt="avatar">
</div>


<div class="signoutdash">
<a href="logout.php">Se déconnecter</a>
</div>

<!-- Affichage des membres -->
<?php
foreach($AllUsers as $AllUser): 
 ?>

<div class="Dash">

<table class="DashTable">
<thead>
<tr>
<th>ID</th>
<th>Nom</th>
<th>Email</th>
<th>IMG</th>
</tr>
</thead>
<tbody>
<tr>
<td><?= $AllUser->idUser; ?></td>
<td><?= $AllUser->user_name; ?></td>
<td> <?= $AllUser->email; ?></td>
<td> <img src="../avatars/<?= $AllUser->avatar; ?>" class="avatarindash" alt="avatar"></td>
</tr>
</tbody>
</table>

</div>

 <?php endforeach; ?>
 <!-- ---------------------------- -->
 <?php require '../inc/footer.php'; ?>
