<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Delete a shot from the list in the database
*/

$shot_id = $_GET['shot_id'];

if(isset($_GET['shot_id'])) {
	$shot_id = $_GET['shot_id'];

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "delete from shotList where shot_id=:shot_id";

	$st = $db->prepare($query);
	$st->bindParam(":shot_id", $shot_id);

	$st->execute();

	$shots = $st->fetchAll();

	//Json encode the response
	echo $json_reponse = json_encode($shots);
	
}

?>