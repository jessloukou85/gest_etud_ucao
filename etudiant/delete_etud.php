<?php
    include '../DATA/cnxion.php';
    $sql = 'DELETE from etudiant where student_id = 1 limit 1';
    $delete = $cnx -> prepare($sql);
              $delete -> bindValue('1',$_GET['num_etudiant'],pdo::PARAM_INT);
    $delete_etud_is_ok = $delete -> execute();
    if($delete_etud_is_ok){
        $msg = 'etudiant supprimer';
    }else{
        $msg = "aucune suppression n'a pu etre effectuée";
    }
?>
    <h2><?= $msg; ?></h2>