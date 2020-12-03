<?php

use App\Controller\DefaultController;
use App\Controller\SurveyController;

require ROOT."/commons.php";

?>

<!DOCTYPE html>
<html lang="fr">
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

<!-- Message d'accueil -->

<div class="jumbotron">
  <h1 class="display-3">SurveySite</h1>
  <p class="lead">Bienvenue sur notre site de sondage, créez un sondage ou votez sur ceux ci-dessous !</p>
</div>

<!-- Sondages sous forme de carte à cliquer -->

<div class="container">

<?php foreach($surveys as $su):  ?>

<div class="card border-primary mb-3" style="max-width: 20rem; margin: 50px">
  <div class="card-header"><a href="?page=survey&id=<?= $su['survey_id'] ?>"><?php echo $su['question'] ?></a></div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">Crée par : <a href="?page=user&name=<?= $su['user_name'] ?>"><?= $su['user_name'] ?></a></p>
    <p class="card-text">Status : <?php if ($su['status'] == true) {?> Actif <?php } else if ($su['status'] == 0){ ?> Fini <?php } else { echo "zizi" ;} ?></p>
  </div>
</div>

<?php endforeach; ?>

</div>
    
</body>
</html>