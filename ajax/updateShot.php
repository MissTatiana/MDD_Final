<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Update the status of a shot
*/

$shot = array();
$shot['status'] = $_GET['status'];
$shot['shot_id'] = $_GET['shot_id'];



if(isset($shot['shot_id'])) {

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");
	$query = "update shotList set status=:status where shot_id=:shot_id";

	$st = $db->prepare($query);

	$st->execute($shot);

	//var_dump($st->errorInfo());

}

?>