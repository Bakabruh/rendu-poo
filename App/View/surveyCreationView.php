<?php

use App\Controller\SurveyController;

require ROOT."/bootstraplink.html"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create survey</title>
</head>
<body>

<style>
    form {
        width: 500px;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
    }

    form input {
        margin: 30px;
    }
</style>

    <form action="?page=createSurvey" method="POST">
        <label for="title">Survey's question</label>
        <input type="text" name="title" id="poll-title" placeholder="Question...">
        <select name="select" id="questionsNumber">
            <option selected value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <input type="text" name="answer1" id="question1" placeholder="Answer">
    </form>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
    
    let select = $('#questionsNumber');
    let options = ["2", "3", "4"];

    select.change(function(e){
        e.preventDefault();

        for(let i=0; i<select.val(); i++) {
                select.append("<input type='text' name='answer" + i+2 +"' id='question" + i+2 +"'>");
            }
    })

    function selectOption() {

        for(let i=0; i<=options.length; i++) {
            let i=0;
            select.append("<option>" + option[i] + "</option>");
            i++;
        }
    }

    </script>
</body>
</html>