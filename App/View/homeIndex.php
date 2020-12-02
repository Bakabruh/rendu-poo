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
  <p class="lead">Welcome on the new survey plateform : here you can create create your own survey or vote for the choice you think is the best, in the large variety of surveys that other users have already done.</p>
</div>

<!-- Sondages sous forme de carte à cliquer -->

<div class="container">

<?php foreach($surveys as $su):  ?>

<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?page=survey&id=<?= $su['survey_id'] ?>"><?php echo $su['question'] ?></a></div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">Crée par : <?= $su['user_name'] ?></p>
  </div>
</div>

<?php endforeach; ?>

</div>
    
</body>
</html>