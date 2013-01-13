<?
/*
 * PiHome v1.0
 * http://pihome.harkemedia.de/
 *
 * PiHome Copyright (c) 2012, Sebastian Harke
 * Lizenz Informationen.
 * 
 * This work is licensed under the Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Unported License. To view a copy of this license,
 * visit: http://creativecommons.org/licenses/by-nc-sa/3.0/.
 *
*/

include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");

$value = $_GET["s"];

if($_GET["s"]){

	$cutvalue=explode("_", $value);
	$lid  = $cutvalue[0];
	$stat = $cutvalue[1];

	setLightStatus($lid,$stat);
	$code = getCodeById($lid);

	#exec("echo 'klick ".$lid." ".$stat." ".$code['letter']." ".$code['code']."' >> klick.txt  ");

	file_get_contents("http://localhost:8888/request/".$code['letter']."/".$stat."/".$code['code']);
	#exec("sudo python3.2 api.py A on 1 0 0 0 0 ");

}
?>
