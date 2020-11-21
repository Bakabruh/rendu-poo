<?php

use App\Controller\SurveyController;

require ROOT."/bootsraplink.html"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create survey</title>
</head>
<body>

    <form action="?page=createSurvey" method="POST">
        <input type="text" name="title" id="poll-title" placeholder="Question...">
        <?php
            $selected = "1";
            $options = array("1", "2", "3", "4");
            echo "<select id='questionsNumber'>";
                foreach($options as $options) {
                    if ($selected == $option) {
                        echo "<option selected='selected' value='$option'>$option</option>";
                    } else{
                        echo "<option value='$option'>$option</option>";
                    }
                }
            echo "</select>";
        ?>
        <input type="text" name="question" id="question1">
        <input type="text" name="question" id="question2">
        <input type="text" name="question" id="question3">
        <input type="text" name="question" id="question4">
    </form>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ROOT.'/Public/assets/js/createSurvey.js'"></script>
</body>
</html>