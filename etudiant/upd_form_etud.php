<?php
    $msg = "";
    include '../DATA/cnxion.php';
    $sql = 'SELECT * from etudiant where student_id = :num';
    $select_one = $cnx->prepare($sql);
                  $select_one->bindValue(':num',$_GET['num_etudiant'],pdo::PARAM_INT);
                  $select_one->execute();
    $select_one_Is_OK = $select_one -> fetch();
?>
<h3><?= $msg ?></h3>
<div class="container-fluid">
    <div class="container" align="center">
        <div class="row">
            <form action="update_etud.php" method="post">
                <table>
                    <div class="col-4">
                        <input type="hidden" name="num_etudiant" placeholder="nom" value="<?= $select_one_Is_OK['student_id'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">nom</label>
                        <input type="text" name="last_name" placeholder="nom" value="<?= $select_one_Is_OK['last_name'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">prenoms</label>
                        <input type="text" name="first_name" placeholder="prenoms" value="<?= $select_one_Is_OK['first_name'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">date de naissance</label>
                        <input type="date" name="date_of_birth" placeholder="date de naissance" value="<?= $select_one_Is_OK['date_of_birth'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">lieu de naissance</label>
                        <input type="text" name="place_of_birth" placeholder="lieu de naissance" value="<?= $select_one_Is_OK['place_of_birth'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">nationnalité</label>
                        <input type="text" name="nationality" placeholder="nationnalité" value="<?= $select_one_Is_OK['nationality'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">email</label>
                        <input type="email" name="mail" placeholder="email" value="<?= $select_one_Is_OK['mail'] ?>" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">pays d'origine</label>
                        <input type="text" name="country" placeholder="pays" value="<?= $select_one_Is_OK['country'] ?>" >
                    </div>
                    <div>
                        <button type="submit" name="enregistrer" class="btn btn-primary" >enregistrer les modifications</button>
                    </div>
                </table>
            </form>
        </div>
    </div>
</div>