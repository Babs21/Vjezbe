<?php

/* define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
require('includes/classes/class.Database.php');
		
$Database = new Database(); */
		
$ime 			= $_POST["ime"];
$prezime 		= $_POST["prezime"];
$spol 			= $_POST["spol"];
$datum 			= $_POST["datum"];
$adresa 		= $_POST["adresa"];
//$krv1			= $_POST["krv"];
//$krv2 			= $_POST["krv2"];
//$krv 			= $_POST["krv"].$_POST["krv2"];
$tegobe 		= $_POST["tegobe"];
$tegobeinfo 	= $_POST["tegobeinfo"];
$alergija 		= $_POST["alergija"];
$alergijainfo 	= $_POST["alergijainfo"];
		

$app->view()->setData('ime', $ime);
$app->view()->setData('prezime', $prezime);
$app->view()->setData('spol', $spol);
$app->view()->setData('datum', $datum);
$app->view()->setData('adresa', $adresa);
//$app->view()->setData('krv', $krv);
$app->view()->setData('tegobe', $tegobe);
$app->view()->setData('tegobeinfo', $tegobeinfo);
$app->view()->setData('alergija', $alergija);
$app->view()->setData('alergijainfo', $alergijainfo);

include_once('util.php');

