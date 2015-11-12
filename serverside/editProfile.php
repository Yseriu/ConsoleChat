<?php
/**
 * Created by PhpStorm.
 * User: Yseriu
 * Date: 10/11/2015
 * Time: 18:24
 */

include 'connectDB.php';

isset($_GET['login']) or die("Login non spécifié");

$q = $db->prepare("SELECT * FROM members WHERE login=:login");
$q->bindValue('login', $_GET['login'], PDO::PARAM_STR);
$q->execute();

if (!$q)
{
    $insert = $db->prepare("INSERT INTO members (login) VALUES (:login)");
    $insert->bindValue('login', $_GET['login'], PDO::PARAM_STR);
}

if (isset($_GET['pseudo']))
{
    $q = $db->prepare("UPDATE members SET pseudo=:pseudo WHERE login=:login");
    $q->bindValue('pseudo', $_GET['pseudo'], PDO::PARAM_STR);
    $q->bindValue('login', $_GET['login'], PDO::PARAM_STR);
    $q->execute();
}

if (isset($_GET['pcolor']))
{
    $q = $db->prepare("UPDATE members SET pcolor=:pcolor WHERE login=:login");
    $q->bindValue('pcolor', intval($_GET['pcolor']), PDO::PARAM_INT);
    $q->bindValue('login', $_GET['login'], PDO::PARAM_STR);
    $q->execute();
}