<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager 
 * Retreieve the list of projects from the data base
*/

ini_set( "display_errors", 1);
error_reporting(-1);

$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

$query = "select * from projectList 
		  order by project_id asc";

$st = $db->prepare($query);
$st->execute();

$projects = $st->fetchAll();

//json encode the response
echo $json_response = json_encode($projects);


?>