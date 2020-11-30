<?php

use App\Controller\SurveyController;
require ROOT."/commons.php";

?>

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
        background-color: #5259D9;
        padding: 100px;
        border-radius: 30px;
    }

    form label {
        font-family: 'Arial', sans-serif;
        text-transform: uppercase;
        color: #000;
    }

    form input {
        margin: 20px 0;
        padding: 5px 0;
        border-radius: 5px;
    }
</style>

    <form action="?page=createSurvey" method="POST">
        <label for="title">Survey's question</label>
        <input type="text" name="title" id="poll-title" placeholder="Question...">
        <label for="time">How much time do you want to set ?</label>
        <input type="time" name="time" id="time">
        <label for="select">How many questions do you want for your survey ?</label>
        <select name="select" id="questionsNumber">
            <option selected value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <label for="answer1">Questions :</label>
        <input type="text" name="answer1" class="response" id="response1" placeholder="Answer">

        <button type="submit">Create your survey</button>
    </form>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
    
    let select = document.getElementById('questionsNumber');
    let options = ["2", "3", "4"];

    select.addEventListener("click", function(e){
        e.preventDefault();

        for(let i=0; i<select.value; i++) {
                select.createElement("<input type='text' name='answer" + i+2 +"' id='response" + i+2 +"'>");
            }

        for(let i=0; i<=options.length; i++) {
            let i=0;
            select.appendChild("<option>" + option[i] + "</option>");
            i++;
        }
    })

    </script>
</body>
</html>