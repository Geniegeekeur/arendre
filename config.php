<?php
try //On essaye
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=tweetir;charset=utf8', 'root', ''); // D'accéder à notre base de donées
}catch (Exception $e) // Sinon
{
    die('Erreur'.$e->getMessage()); // On récupère notre message d'erreur en fermant la page
}
