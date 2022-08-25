<?php
    include '../DATA/cnxion.php';
    $sql = "SELECT * from etudiant order by (student_id)";
    $select = $cnx->prepare($sql);
              $select->execute();
    $etudiants = $select->fetchAll();
    $etudiants = array_values($etudiants);
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <table border="1" align="center">
                <thead>
                    <tr>
                        <th>identifiant</th>
                        <th>noms</th>
                        <th>prenoms</th>
                        <th>date naissance</th>
                        <th>lieu de naissance</th>
                        <th>nationnalité</th>
                        <th>email</th>
                        <th>pays</th>
                        <th colspan="2" style="text-align:center">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant ):?>
                    <tr>
                        <td><?= $etudiant['student_id']?></td>
                        <td><?= $etudiant['last_name']?></td>
                        <td><?= $etudiant['first_name']?></td>
                        <td><?= $etudiant['date_of_birth']?></td>
                        <td><?= $etudiant['place_of_birth']?></td>
                        <td><?= $etudiant['nationality']?></td>
                        <td><?= $etudiant['mail']?></td>
                        <td><?= $etudiant['country']?></td>
                        <th>
                            <td><a href="upd_form_etud.php?num_etudiant=<?= $etudiant['student_id']; ?>" class="btn btn-success" role="button">modifier</a></td>
                        </th>
                        <th>
                            <td><a href="delete_etud.php?num_etudiant=<?= $etudiant['student_id']; ?>" class="btn btn-danger" role="button">supprimer</a></td>
                        </th>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>