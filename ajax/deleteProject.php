<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Delete a shot from projectList
*/

$project_id = $_GET['project_id'];

if(isset($_GET['project_id'])) {

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "delete from projectList where project_id=:project_id";

	$st = $db->prepare($query);
	$st->bindParam(":project_id", $project_id);

	$st->execute();

	$shots = $st->fetchAll();

	//Json encode the response
	echo $json_reponse = json_encode($shots);
	
}

?>