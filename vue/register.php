<?php 
require '../inc/head.php'; 
require '../action/registeraction.php';
?>

<!-- Formulaire d'inscription  -->

<h2>Inscription</h2>


<?php if (!empty($erreur)) : ?>
    <div class="showerror">
        <p>Vous n'avez pas rempli le formulaire correctement !</p>
        <ul>
            <?php foreach ($erreur as $erreur) : ?>
                <li class="error"><?= $erreur; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container">
<form method="POST" action="#" enctype="multipart/form-data">

    <div class="champ-form">   
        <label for="pseudo" class="form_lab">Pseudo : </label>  
        <input type="text" name="pseudo" id="pseudo" class="form_in">
    </div>

    <div class="champ-form">  
        <label for="email" class="form_lab">Email : </label>
        <input type="text" name="email" class="form_in"/>
       </div>

    <div class="champ-form">   
        <label for="mdp" class="form_lab">Mot de passe : </label>
        <input type="password" name="mdp" id="mdp" class="form_in">
        </div>

    <div class="champ-form">  
        <label for="mdp2" class="form_lab">Confirmez le mot de passe : </label> 
        <input type="password" name="mdp2" id="mdp2" class="form_inmdp">
      </div>

    <label>Avatar :</label>
   <input type="file" name="avatarFile" class="avatar">


    <input type="submit" name="valid" value="Inscription" id="valid" class="valide">

</form>
</div>
<div class="sign">
   <p>Déjà membre ? <a href="login.php">Connexion.</a></p> 
</div>
<?php require '../inc/footer.php'; ?>