//Define angular module
var app = angular.module('myApp', [
	'ngRoute'
]);

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider.
	when('/projects', {
		templateUrl: 'partials/project.html',
		controller: 'projectController'
	}).
	when('/shots/:project_shot_id', {
		templateUrl: 'partials/shot.html',
		controller: 'shotController'
	}).
	otherwise({
		redirectTo: '/projects'
	})
}]);//config

app.controller('projectController', function($scope, $http) {
	getProject();

	//retrieve projects from db
	function getProject() {
		$http.get("ajax/getProject.php?").success(function(data) {
			$scope.projects = data;
		});
	};//getProject

	//add a project to the db
	$scope.addProject = function(project_title, project_desc) {
		$http.get("ajax/addProject.php?project_title=" + project_title + "&project_desc=" + project_desc).success(function(data) {
			getProject();
		});
	};//addProject

	//delete a project from the db
	$scope.deleteProject = function(project_id) {
		if(confirm("Are you sure to delete this project?")) {
			$http.get("ajax/deleteProject.php?project_id=" + project_id).success(function(data) {
				getProject();
			});
		}
	};//deleteProject

});//projectController

app.controller('shotController', function($scope, $http, $routeParams) {
	getShot();

	var project_id = "";

	//retrieve shots from db
	function getShot() {
		$http.get("ajax/getShot.php?project_shot_id=" + $routeParams.project_shot_id).success(function(data) {
			$scope.shots = data;

			project_id = $routeParams.project_shot_id;
		});
	};//getShot

	//add a shot to the db 
	$scope.addShot = function(shot_num, shot_type, movement, description) {

		console.log(project_id);

		$http.get("ajax/addShot.php?project_shot_id=" + project_id + "&shot_num=" + shot_num + "&shot_type=" + shot_type+"&movement=" + movement + "&description=" + description).success(function(data) {
			getShot();
		});
	};//addShot

	//delete a shot from the db
	$scope.deleteShot = function(shot_id) {
		if(confirm("Are you sure to delete this shot?")) {
			$http.get("ajax/deleteShot.php?shot_id=" + shot_id).success(function(data) {
				getShot();
			});
		}
	};//deleteShot

	//edit a shot from the db
	$scope.editShot = function(shot_id, shot_num, shot_type, movement, description) {
		$http.get("ajax/editShot.php?shot_id=" + shot_id + "&shot_num=" + shot_num + "&shot_type=" + shot_type + "&movement=" + movement + "&description=" + description).success(function(data) {
			getShot();
		});
	};//editShot

	//toggle the status of a shot
	$scope.toggleStatus = function(shot_id, status, description) {
		if(status == '2'){
			status = '0';
		}
		else {
			status = '2';
		}
		$http.get("ajax/updateShot.php?shot_id=" + shot_id + "&status=" + status).success(function(data) {
			getShot();
		});
	};//toggleStatus

});//shotController
