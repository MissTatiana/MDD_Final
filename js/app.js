//Define angular module
var app = angular.module('myApp', []);

app.controller('shotController', function($scope, $http) {
	getShot();

	//retrieve shots from db
	function getShot() {
		$http.get("ajax/getShot.php").success(function(data) {
			$scope.shots = data;
		});
	};//getShot

	//add a shot to the db 
	$scope.addShot = function(shot_num, shot_type, movement, description) {
		$http.get("ajax/addShot.php?shot_num="+shot_num+"&shot_type="+shot_type+"&movement="+movement+"&description="+description).success(function(data) {
			getShot();
			$scope.shot_num_input = "";
			$scope.shot_type_input = "";
			$scope.movement_input = "";
			$scope.description_input = "";
		});
	};//addShot

	//delete a shot from the db
	$scope.deleteShot = function(shot_id) {
		if(confirm("Are you sure to delete this shot?")) {
			$http.get("ajax/deleteShot.php?shot_id="+shot_id).success(function(data) {
				getShot();
			});
		}
	};//deleteShot

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

});//end all
