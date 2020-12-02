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
<p><br> de <a href="?page=user&name=<?= $survey['user_name'] ?>"><?= $survey['user_name'] ?></a></p>

<hr>

<h2>Votez</h2>

<form action="?page=survey&id= <?= $SurId ?>" method="POST">
    <?php 
    $i = 1;
    foreach($reps as $rep) { ?>
        <label for="<?= $i ?>"><?= $rep['reponse'] ?></label>
        <input type="radio" name="rep" value="<?= $rep['id']  ?>" id="<?= $i ?>">
        <br>
    <?php $i++; 
    }?>
    <input type="hidden" name="vote" value="<?= $SurId ?>">
    <button type="submit" class="btn btn-primary">Répondre !</button>
</form>

<hr>

<h2>Réponses</h2>

<div id="results">
</div>

<hr>

<h2>Commentaires</h2>

<div id="commentbox">
</div>
<form action="?page=survey&id= <?= $SurId ?>&function=comment" method="POST">
        <input type="text" name="comment" id="comment">
        <button id="button" type="submit">Commenter</button>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script src="/assets/js/polls.js"></script>


