<?php

use App\Controller\SurveyController;
require ROOT."/commons.php";

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondage</title>
</head>

<body>

    <!-- Afficher le titre du sondage -->
    <h1><?= $survey['question'] ?> </h1>
    <p><br> de <a href="?page=user&name=<?= $survey['user_name'] ?>"><?= $survey['user_name'] ?></a></p>

    <hr>

    <!-- Voter pour son choix -->
    <?php if ($survey['status'] == 1) { ?>

    <div class="Voter">
        <h2>Votez</h2>

        <form action="?page=survey&id= <?= $SurId ?>" method="POST">
            <?php $i = 1; foreach($reps as $rep) { ?>
            <label for="<?= $i ?>"><?= $rep['reponse'] ?></label>
            <input type="radio" name="rep" value="<?= $rep['id']  ?>" id="<?= $i ?>">
            <br>
            <?php $i++; 
        }?>
            <input type="hidden" name="vote" value="<?= $SurId ?>">
            <button type="submit" class="btn btn-primary">Répondre !</button>
        </form>

        <hr>
    </div>
    

    <?php } else if ($survey['status'] == 0) { ?>



    <?php } ?>

    <h2>Réponses</h2>

    <!-- Div qui va accueillir les réponses -->
    <div id="results">
    </div>


    <!-- Affichage des commentaires -->
   

        <div class="sectioncoms">
            <hr>

            <h2>Commentaires</h2>

            <div id="commentbox">
                <?php foreach($coms as $com) { ?>
                    <div class="message"><h6><?= $com['author'] ?> le <?= $com['created_at'] ?></h6><p><?= $com['content'] ?></p></div>
                <?php } ?>
            </div>
            <!-- <form action="?page=survey&id= <?= $SurId ?>&function=comment" method="POST">
                <input type="text" name="comment" id="comment">
                <button id="button" type="submit">Commenter</button>
            </form> -->
        </div>
    
        
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script src="/assets/js/polls.js"></script>