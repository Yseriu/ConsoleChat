<?php
/**
 * Created by PhpStorm.
 * User: Yseriu
 * Date: 08/11/2015
 * Time: 13:16
 */
if (isset($_GET['message']) && isset($_GET['sender']))
{
    include_once('connectDB.php');
    $q = $db->prepare("INSERT INTO messages (auteur, contenu) VALUES (:auteur, :contenu)");
    $q->bindValue("auteur", $_GET['sender'], PDO::PARAM_STR);
    $q->bindValue("contenu", $_GET['message'], PDO::PARAM_STR);
    echo $q->execute() ? 'Succes' : 'Echec';
}
else
{
    echo "Cette page utilise les paramètres suivants :\n
           'message' contient votre message\n
           'sender' contient votre nom\n";
}