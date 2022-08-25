<?php
$msg = '';
    include '../DATA/cnxion.php';
    if(isset($_POST['enregistrer'])){
        $no =(string)htmlspecialchars($_POST['last_name']);
        $pr =(string)htmlspecialchars($_POST['first_name']);
        $dn =(string)htmlspecialchars($_POST['date_of_birth']);
        $ln =(string)htmlspecialchars($_POST['place_of_birth']);
        $nt =(string)htmlspecialchars($_POST['nationality']);
        $ml =(string)htmlspecialchars($_POST['mail']);
        $ctr =(string)htmlspecialchars($_POST['country']);
        if(!empty($no) and !empty($pr) and !empty($dn) and !empty($ln) and !empty($nt) and !empty($ml) and !empty($ctr)){
            $mel = $cnx->prepare('SELECT * from etudiant where mail = ?');
                   $mel->execute([$ml]);
            $melExist = $mel->rowcount();
            if($melExist){
                $msg = 'cette adresse mail existe deja';
            }else{
                $insert = $cnx->prepare('INSERT into etudiant values (null,?,?,?,?,?,?,?)');
                $insert_Is_Ok = $insert->execute([$no,$pr,$dn,$ln,$nt,$ml,$ctr]);
                if($insert_Is_Ok){
                    $msg = "les données de l'etudiant ont bien ete enregistré ";
                }else{
                    $msg = "erreur d'insertion veuillez reessayer!!";
                }
            }
        }else{
            $msg = 'veuillez renseigner les champs vides';
        }
    }
    var_dump($_POST);
?>
<h3><?= $msg ?></h3>
<div class="container-fluid">
    <div class="container" align="center">
        <div class="row">
            <form action="" method="post">
                <table>
                    <div class="col-4">
                        <label for="last_name">nom</label>
                        <input type="text" name="last_name" placeholder="nom" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">prenoms</label>
                        <input type="text" name="first_name" placeholder="prenoms" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">date de naissance</label>
                        <input type="date" name="date_of_birth" placeholder="date de naissance" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">lieu de naissance</label>
                        <input type="text" name="place_of_birth" placeholder="lieu de naissance" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">nationnalité</label>
                        <input type="text" name="nationality" placeholder="nationnalité" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">email</label>
                        <input type="email" name="mail" placeholder="email" >
                    </div>
                    <div class="col-4">
                        <label for="last_name">pays d'origine</label>
                        <input type="text" name="country" placeholder="pays" >
                    </div>
                    <div>
                        <button type="submit" name="enregistrer" class="btn btn-primary" >enregistrer</button>
                    </div>
                </table>
            </form>
        </div>
    </div>
</div>