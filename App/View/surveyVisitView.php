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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>

    function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace( 
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }

    function scoreboard(){
        $("#results").html("")
        $.ajax({
            url:"?page=survey&id=" + $_GET("id") +"&function",
            dataType:"json",
            success:function(response){

                console.log(response);

                let i = 1;
                response.forEach(vote => {
                    $("#results").append(`<div id="rep` + i + `" class="option"><div class="conteneur" id="cont` + i + `" ></div></div>`)
                    let compte = Object.values(vote)[3];

                    for(let x = 0; x < compte; x++) {
                        $('#cont' + i + '').append(`<div class="voix"></div>`)
                    }
                    
                    $('#rep' + i + '').append(`<p class="reponse">` + vote.reponse + `</p>`)

                    i++;
                });  
            }
        });
    }

    scoreboard();

    setInterval(scoreboard, 3000);
        

</script>

