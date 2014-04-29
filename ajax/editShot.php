<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Edit a selected shot with new input
*/

$shot = array();
$shot['shot_id'] = $_GET['shot_id']
$shot['shot_type'] = $_GET['shot_type'];
$shot['movement'] = $_GET['movement'];
$shot['description'] = $_GET['description'];

if(isset($shot_id, $shot_type, $movement, $description)) {

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "update shotList set 
			  shot_type = :shot_type,
			  movement = :movement,
			  description = :description 
			  where shot_id = :shot_id";

	$st = $db->prepare($query);

	$st->execute($shot);

}

?>