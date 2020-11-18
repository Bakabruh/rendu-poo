<?php

use App\Controller\UserController;

require ROOT."/commons.php";

?>

<h2>Vous visitez la page de : <?= $_GET['name'] . "#" . $host[0]['user_id'] ?></h2>

