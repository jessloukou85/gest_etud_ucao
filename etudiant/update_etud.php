<?php
var_dump($_POST);
    include '../DATA/cnxion.php';
    $sql = 'UPDATE etudiant set last_name = :1 ,first_name =:2, date_of_birth =:3, place_of_birth =:4, nationality =:5, mail=:6, country =:7 where student_id = :8 limit 1';
    $update =$cnx -> prepare($sql);
    $update -> bindValue(':1',$_POST['last_name'],pdo::PARAM_STR);
    $update -> bindValue(':2',$_POST['first_name'],pdo::PARAM_STR);
    $update -> bindValue(':3',$_POST['date_of_birth'],pdo::PARAM_STR);
    $update -> bindValue(':4',$_POST['place_of_birth'],pdo::PARAM_STR);
    $update -> bindValue(':5',$_POST['nationality'],pdo::PARAM_STR);
    $update -> bindValue(':6',$_POST['mail'],pdo::PARAM_STR);
    $update -> bindValue(':7',$_POST['country'],pdo::PARAM_STR);
    $update -> bindValue(':8',$_POST['num_etudiant'],pdo::PARAM_INT);
    $update_Is_Ok = $update->execute();
        if($update_Is_Ok){
            $msg ='modif effectuée avec succes';
        }else{
            $msg ='une erreur sait produit';
        }
?>
<h3><?= $msg ; ?></h3>