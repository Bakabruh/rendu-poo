<?php

use App\Controller\UserController;

require ROOT."/commons.php";


?>

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
        <td>En cours</td>
        <td><a href="?page=survey&id=<?= $su['survey_id'] ?>"><?= $su['question'] ?></a></td>
    </tr>

<?php } ?>

</table>

<?php } ?>

