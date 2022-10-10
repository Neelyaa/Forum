
<?php 
require '../action/loginaction.php';
require '../inc/head.php'; 
?>


<!-- Formulaire de connexion -->
<h2>Connexion</h2>


<div class="containerlog">

    <form method="POST" action="#">
        <div class="champ-form">      
            <label for="pseudo" class="form_lab">Pseudo ou email : </label>
            <input type="text" name="pseudo" id="pseudo" class="form_in">
      </div>

        <div class="champ-form">        
            <label for="mdp" class="form_lab">Mot de passe : </label>
            <input type="password" name="mdp" id="mdp" class="form_in">
    
            <!-- <a href="forget.php"><i class="forget">J'ai oublié mon mot de passe</i></a> -->

       
        </div>
        <input type="submit" name="valid" value="Connexion" id="valid" class="valide">
    </form>
</div>

<div class="sign">
    <p>Vous n'avez pas de compte ? <a href="register.php">S'inscrire.</a></p>
</div>
<?php require '../inc/footer.php'; ?>