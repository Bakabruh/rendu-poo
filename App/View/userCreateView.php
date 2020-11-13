<?php

use App\Controller\UserController;

include ROOT."/bootstraplink.html"; ?>


<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputName1">Nom</label>
    <input type="text" name="name" class="form-control" id="exampleInputName1">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>