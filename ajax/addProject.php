<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager 
 * Add a new project to the db
*/

$project_title = $_GET['project_title'];
$project_desc = $_GET['project_desc'];

if(isset($project_title, $project_desc)) {

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "insert into projectList(project_title, project_desc)
			  values(:project_title, :project_desc)";

	$st = $db->prepare($query);
	$st->bindParam(":project_title", $project_title);
	$st->bindParam(":project_desc", $project_desc);

	$st->execute();

}

?>