<?php

use App\Controller\DefaultController;
use App\Controller\SurveyController;

require ROOT."/commons.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

<style>

 .container {
   display: flex;
   flex-wrap: wrap;
   justify-content: center;
 }

</style>

<!-- Main content -->

<div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>

<!-- Sondages sous forme de carte à cliquer -->

<div class="container">

<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?task=write">Survey</a></div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?task=write">Survey</a></div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?task=write">Survey</a></div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?task=write">Survey</a></div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?task=write">Survey</a></div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?task=write">Survey</a></div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

</div>
    
</body>
</html>