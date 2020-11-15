<?php

use App\Controller\UserController;

require ROOT."/commons.php"; 

?>


<h1>Ce site à besoin d'un compte, rejoins-nous !</h1>


<form action="?page=create-user" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">On la partagera pas, c'est promis !</small>
  </div>

  <div class="form-group">
    <label for="exampleInputName1">Nom</label>
    <input type="text" name="name" class="form-control" id="exampleInputName1">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>

  <input type="hidden" name="action" value="create">

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<h1>Déjà membre ? Connecte toi !</h1>

<form action="?page=create-user" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="connect-mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" name="connect-pass" class="form-control" id="exampleInputPassword1">
  </div>

  <input type="hidden" name="action" value="connect">

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

