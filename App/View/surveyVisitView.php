<?php

use App\Controller\SurveyController;
require ROOT."/commons.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit survey</title>
</head>
<body>

<h1><?= $survey['question'] ?> </h1> 
<p><br> de <?= $survey['user_name'] ?></p>

<hr>

<h2>Réponses</h2>

    <form action="?page=survey&id= <?= $SurId ?>" method="POST">
        <?php 
        $i = 1;
        foreach($reps as $rep) { ?>
            <label for="<?= $i ?>"><?= $rep['reponse'] ?></label>
            <input type="radio" name="rep" value="<?= $rep['id']  ?>" id="<?= $i ?>">
            <br>
        <?php $i++; 
        } var_dump($_GET['id']);?>
        <input type="hidden" name="vote" value="<?= $SurId ?>">
        <button type="submit" class="btn btn-primary">Répondre !</button>
    </form>




