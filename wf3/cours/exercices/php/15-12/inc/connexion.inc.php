<?php 
/*
	Ce fichier fait la connexion entre PHP et MySQL
*/

// Cette variable sert à déterminer si on est dans notre environnement local ou en ligne
$online = false; // valeur true ou false

if ($online) {
	$host     = "";
	$user     = "";
	$password = "";
	$dbName   = ""; // nom de la base de donnée
} else {
	$host     = "localhost";
	$user     = "root";
	$password = "";
	$dbName   = "blog"; // nom de la base de donnée
}

try {	
	$connexion = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8',$user,$password);
} catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage() . '<br />';
	echo 'N°     : ' . $e->getCode() . '<br />';
	die();
}
?>