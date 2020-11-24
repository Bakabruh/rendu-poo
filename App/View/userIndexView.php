<?php

use App\Controller\UserController;

require ROOT."/commons.php";

?>

<body>
    <h1>Profile de <?= $_SESSION['Username'] ?></h1>

    <hr>

    <section>

        <h2>Liste d'amis</h2>

        <?php if(count($friends) <= 0) { ?>

            <p>C'est vide par ici</p>

        <?php } else { ?>

            <table class="table" id="friendTable">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Sondage en cours ?</th>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                </tr>

                <?php foreach($friends as $fr) { ?>

                    <tr>
                        <td>Offline</td>
                        <td><a href="?page=user&name=<?= $fr['user_name'] ?>"><?= $fr['user_name'] ?></a></td>
                        <td>None</td>
                        <td><?= $fr['user_id'] ?></td>
                        <td>
                            <form action="?page=user" method="POST"> 
                                <input type="hidden" name="delete" value="<?= $fr['user_id'] ?>">
                                <button type="submit">Retirer</button>
                            </form> 
                        </td>
                    </tr>

                <?php } ?>

            </table>

        <?php } ?>
    </section>
    

    <hr>

    <section>
         <h2>Demandes d'amis</h2>

        <?php if (isset($fReqs)) { ?>

        <table class="table" id="RequestsTable">
                <thead class="thead-dark">
            <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">Ajouter ?</th>
            </tr>

            <?php foreach($fReqs as $fq) { ?>

            <tr>
                <td><a href="?page=user&name=<?= $fq['user_name'] ?>"><?= $fq['user_name'] ?></a></td>
                
                <td> 
                    <form action="?page=user" method="POST"> 
                        <input type="hidden" name="accept" value="<?= $fq['request_id'] ?>">
                        <input type="hidden" name="id1" value="<?= $fq['user_1_id'] ?>">
                        <button type="submit">Ajouter</button>
                    </form>

                    <form action="?page=user" method="POST"> 
                        <input type="hidden" name="decline" value="<?= $fq['request_id'] ?>">
                        <input type="hidden" name="id1" value="<?= $fq['user_1_id'] ?>">
                        <button type="submit">Refuser</button>
                    </form>    
                </td>
                    
            </tr>

            <?php } 
            } else { ?>

            <p>C'est vide par ici</p>

            <?php } ?>

         </table>
    </section>
   


    <hr>

    <section>
        <h2>Ajout d'amis</h2>

        <form action="?page=user&search=on" method="POST">
            <input type="text" name="search" placeholder="Chercher un utilisateur" <?php if(isset($quest)) { echo 'value="' . $_POST['search'] . '"';} ?> required>
            <button type="submit">Chercher</button>
        </form>


        <?php if(isset($quest)) { ?>

            <p>Liste des utilisateurs avec un pseudo comprenant <strong><?= $_POST['search'] ?></strong></p>

            <table class="table" id="SearchTable">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">#</th>
                    <th scope="col">Friend ?</th>
                </tr>

                <?php foreach($quest as $rq) { ?>

                <tr>
                    <?php if($rq['user_name'] == $_SESSION['Username']) { ?>
                        
                        <td>En ligne</td>

                    <?php } else { ?>
                        <td>Offline</td>
                    <?php } ?>

                    <td><a href="?page=user&name=<?= $rq['user_name'] ?>"><?= $rq['user_name'] ?></a></td>
                    
                    <td><?= $rq['user_id'] ?></td>

                    <?php if($rq['user_name'] == $_SESSION['Username']) { ?>
                    
                        <td></td>

                    <?php } else { ?>
                        <td>
                            <form action="?page=user" method="POST">
                            
                                <input type="hidden" name="rq_user_name" value="<?= $rq['user_name'] ?>">
                                <input type="hidden" name="rq_user_id" value="<?= $rq['user_id'] ?>">
                                <button type="submit">Ajouter</button>
                            </form>
                        </td>
                    <?php } ?>
                </tr>

                <?php } ?>
            </table>

            

        <?php } ?>
    </section>
    
    <hr>

    <h2>Vos sondages</h2>

    <p>A ajouter</p>

    <script src="/assets/js/UserPage.js"></script>
</body>