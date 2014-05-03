<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Retreive the list of shots from the database
*/

ini_set( "display_errors", 1 );
error_reporting( -1);

$project_shot_id = $_GET['project_shot_id'];

if(isset($project_shot_id)) {

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "select * from shotList 
			  where project_shot_id = :project_shot_id	
			  order by status, shot_num asc";

	$st = $db->prepare($query);
	$st->bindParam(':project_shot_id', $project_shot_id);

	$st->execute();

	$shots = $st->fetchAll();

	//Json encode the reponse
	echo $json_response = json_encode($shots);

}

?>