<?php 
    session_start();
    require_once './config.php';

        $id = $_GET['id'];

        $check = $bdd->prepare('SELECT titre, contenu FROM texte');
        $check->execute();
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row >= 0){ 
                            $remove = $bdd->prepare("DELETE FROM texte WHERE id = :id");
                            $remove->execute(array(
                                'id' => $id,
                                ));
                            header('Location: ./index.php?reg_err=delete_success');
                            die();
        }else{ header('Location: ./text.php?reg_err=already'); die();}
?>