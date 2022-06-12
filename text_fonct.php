<?php 
    session_start();
    require_once './config.php'; 

    if (!empty($_POST['titre']) && !empty($_POST['texte']))
    {

        $titre = htmlspecialchars($_POST['titre']);
        $texte = $_POST['texte'];
        
        $check = $bdd->prepare('SELECT titre, contenu FROM texte');
        $check->execute();
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row >= 0){ 

                            $insert = $bdd->prepare('INSERT INTO texte(titre, contenu) VALUES(:titre, :texte)');
                            $insert->execute(array(
                                'titre' => $titre,
                                'texte' => $texte,
                                ));
                            header('Location: ./index.php?reg_err=success');
                            die();
        }else{ header('Location: ./text.php?reg_err=already'); die();}
    }