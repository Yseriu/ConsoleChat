<?php
/**
 * Created by PhpStorm.
 * User: Yseriu
 * Date: 08/11/2015
 * Time: 13:16
 */

$linesep = "<br />";
//$linesep = "\n";

include_once('connectDB.php');

date_default_timezone_set("Europe/Paris");

$x = isset($_GET['qte']) ? $_GET['qte'] : 1;
$ans = "";
$msgs = $db->query("SELECT * FROM messages ORDER BY envoie DESC LIMIT " . $x);

if ($msgs) {
    foreach ($msgs as $msg) {
        $ans = "[" . $msg['envoie'] . "] " . $msg['auteur'] . " : " . $msg['contenu'] . $linesep . $ans;
    }
}

echo $ans;