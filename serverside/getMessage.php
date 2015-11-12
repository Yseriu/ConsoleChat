<?php
include_once('connectDB.php');

function toStr($msg, $port='', $linesep = "\n")
{
	if ($port == 'bash')
	{
		$q = $db->prepare("SELECT * FROM members WHERE login=:login");
		$q->setFetchMode(PDO::FETCH_BOTH);
		$q->bindValue('login', $msg['auteur'], PDO::PARAM_STR);
		$q->execute();

		if ($q)
		{
			$user = $q.fetch();
			return "[" . $msg['envoie'] . "] " . $user['pseudo'] == '' ? $msg['auteur'] : $user['pseudo'] . " : " . $msg['contenu'] . $linesep;
		}
	}
	else
	{
		return "[" . $msg['envoie'] . "] " . $msg['auteur'] . " : " . $msg['contenu'] . $linesep;
	}
}