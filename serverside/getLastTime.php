<?php
/**
 * Created by PhpStorm.
 * User: Yseriu
 * Date: 08/11/2015
 * Time: 13:16
 */

include_once('connectDB.php');

date_default_timezone_set("Europe/Paris");

$x = 1;

$msgs = $db->query("SELECT envoie FROM messages ORDER BY envoie DESC LIMIT 1");

if ($msgs) {
    foreach ($msgs as $msg) {
        echo $msg['envoie'];
    }
}