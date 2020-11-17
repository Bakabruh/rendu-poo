<?php

use App\Controller\UserController;

require ROOT."/commons.php";

?>

<h1>Profile de <?= $_SESSION['Username'] ?></h1>

<hr>

<h2>Liste d'amis</h2>

<table border="1">
    <tr>
        <td>Status</td>
        <td>Pseudo</td>
        <td>Sondage en cours</td>
        <td>#</td>
    </tr>

    <?php foreach($friends as $fr) { ?>

    <tr>
        <td>Offline</td>
        <td><a href="?page=user&name=<?= $fr['user_name'] ?>"><?= $fr['user_name'] ?></a></td>
        <td>None</td>
        <td><?= $fr['user_id'] ?></td>
    </tr>

    <?php } ?>
</table>

<hr>

<h2>Demandes d'amis</h2>

<p>A ajouter</p>

<hr>

<h2>Vos sondages</h2>

<p>A ajouter</p>