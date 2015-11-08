<?php
/**
 * Created by PhpStorm.
 * User: Yseriu
 * Date: 08/11/2015
 * Time: 13:16
 */

//$linesep = "<br />";
$linesep = "\n";

include_once('connectDB.php');

date_default_timezone_set("Europe/Paris");

isset($_GET['last']) or die("Unset arg. last");	

$ans = "";
$q = $db->prepare("SELECT * FROM messages WHERE envoie > STR_TO_DATE(:last, '%Y-%m-%d %T') ORDER BY envoie DESC");
$q->bindValue("last", $_GET['last'], PDO::PARAM_STR);
$msgs = $q->execute();

if ($msgs) {
    while ($msg = $q->fetch()) {
        $ans = "[" . $msg['envoie'] . "] " . $msg['auteur'] . " : " . $msg['contenu'] . $linesep . $ans;
    }
}
else echo "no messages";

echo $ans;