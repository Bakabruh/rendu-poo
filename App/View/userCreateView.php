<?php

use App\Controller\UserController;

require ROOT."/commons.php"; 

if(isset($_SESSION['Username'])) {
  header("Location : index.php?page=home");
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoignez-nous !</title>
</head>

<h1>Ce site à besoin d'un compte, rejoins-nous !</h1>

<!-- Formulaire de création de compte -->
<form action="?page=create-user" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="mail" class="form-control"  aria-describedby="emailHelp" <?php if(isset($_POST['mail'])) { echo 'value="' . $_POST['mail'] . '"';} ?> required>
    <small id="emailHelp" class="form-text text-muted">On la partagera pas, c'est promis !</small>
  </div>

  <div class="form-group">
    <label for="exampleInputName1">Nom</label>
    <input type="text" name="name" class="form-control" <?php if(isset($_POST['name'])) { echo 'value="' . $_POST['name'] . '"';} ?> >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Re-tapez votre mot de passe</label>
    <input type="password" name="pass2" class="form-control" >
  </div>

  <input type="hidden" name="action" value="create">

  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<h1>Déjà membre ? Connecte toi !</h1>

<!-- Formulaire de connexion -->
<form action="?page=create-user" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="connect-mail" class="form-control"  aria-describedby="emailHelp" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" name="connect-pass" class="form-control" >
  </div>

  <input type="hidden" name="action" value="connect">

  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

