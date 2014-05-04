<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Add a shot to the list in the database
*/

$project_shot_id = $_GET['project_shot_id'];
$shot_num = $_GET['shot_num'];
$shot_type = $_GET['shot_type'];
$movement = $_GET['movement'];
$description = $_GET['description'];

if(isset($project_shot_id, $shot_num, $shot_type, $movement, $description)) {

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "insert into shotList(project_shot_id, shot_num, shot_type, movement, description)
		  values(:project_shot_id, :shot_num, :shot_type, :movement, :description)";

	$st = $db->prepare($query);
	$st->bindParam(":project_shot_id", $project_shot_id);
	$st->bindParam(":shot_num", $shot_num);
	$st->bindParam(":shot_type", $shot_type);
	$st->bindParam(":movement", $movement);
	$st->bindParam(":description", $description);

	$st->execute();

}

?>