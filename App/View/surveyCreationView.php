<?php

use App\Controller\SurveyController;
require ROOT."/commons.php";
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un sondage</title>
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
            color: #000;
        }

        form input {
            margin: 20px 0;
            padding: 5px 0;
            border-radius: 5px;
        }
    </style>

    <!-- Formulaire pour créer un sondage -->
    <form action="?page=createSurvey" method="POST">

        <label for="pollTitle">Question du sondage</label>

        <input type="text" name="pollTitle" id="pollTitle" placeholder="Question...">

        <label for="time">Combien de temps va durer le sondage ? (HH:mm)</label>

        <!-- choisir les heures -->
        <select name="hour" id="time">
            <?php for($i = 0; $i < 24; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <!-- choisir les minutes -->
        <select name="minutes">
            <?php for($i = 0; $i < 60; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <label for="select">Réponses possibles :</label>

        <input type="text" value="" name="response1" required>
        <input type="text" value="" name="response2" required>
        <input type="text" value="" name="response3">
        <input type="text" value="" name="response4">

        <br>

        <button type="submit">C'est parti !</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
</body>

</html>