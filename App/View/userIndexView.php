<?php

use App\Controller\UserController;

require ROOT."/commons.php";

?>

<h1>Profile de <?= $_SESSION['Username'] ?></h1>

<hr>

<h2>Liste d'amis</h2>

<?php if(count($friends) <= 0) { ?>

    <p>C'est vide par ici</p>

<?php } else { ?>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Status</th>
            <th scope="col">Pseudo</th>
            <th scope="col">#</th>
            <th scope="col">Friend ?</th>
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

<?php } ?>

<hr>

<h2>Ajout d'amis</h2>

    <form action="?page=user&search=on" method="POST">
        <input type="text" name="search" placeholder="Chercher un utilisateur" required>
        <button type="submit">Chercher</button>
    </form>


<?php if(isset($quest)) { ?>

    <p>Liste des utilisateurs avec un pseudo comprenant <strong><?= $_POST['search'] ?></strong></p>

    <table class="table">
        <thead class="thead-dark">
    <tr>
        <th scope="col">Status</th>
        <th scope="col">Pseudo</th>
        <th scope="col">#</th>
        <th scope="col">Friend ?</th>
    </tr>

    <?php foreach($quest as $rq) { ?>

    <tr>
        <td>Offline</td>
        <td><a href="?page=user&name=<?= $rq['user_name'] ?>"><?= $rq['user_name'] ?></a></td>
        <td><?= $rq['user_id'] ?></td>
        <?php if($rq['user_name'] == $_SESSION['Username']) { ?>
        
            <td>C'est toi</td>

        <?php } else { ?>
            <td><a href="">Ajouter</a></td>
        <?php } ?>
    </tr>

    <?php } ?>
</table>

    

<?php } ?>

<hr>

<h2>Vos sondages</h2>

<p>A ajouter</p>