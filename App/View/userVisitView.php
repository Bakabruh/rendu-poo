<?php

use App\Controller\UserController;

require ROOT."/commons.php";


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visite</title>
</head>

<h1>Vous visitez la page de : <?= $_GET['name'] . "#" . $host[0]['user_id'] ?></h1>

<hr>

<h2>Sondages en cours</h2>

<?php if(count($surveys) <= 0) { ?>

<p>C'est vide par ici</p>

<?php } else { ?>

<table class="table" id="friendTable">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Status</th>
            <th scope="col">Question</th>
        </tr>

        <?php foreach($surveys as $su) { ?>

        <tr>
            <td><?php if ($su['status'] == true) {?> Actif <?php } else if ($su['status'] == 0){ ?> Fini <?php } ?></td>
            <td><a href="?page=survey&id=<?= $su['survey_id'] ?>"><?= $su['question'] ?></a></td>
        </tr>

        <?php } ?>

</table>

<?php } ?>