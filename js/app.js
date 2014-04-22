//Define angular module
var app = angular.module('myApp', []);

app.controller('shotController', function($scope, $http) {
	getShot();

	//retrieve shots from db
	function getShot() {
		$http.get("ajax/getShot.php").success(function(data) {
			$scope.shots = data;
		});
	};

	//add a shot to the db 
	$scope.addShot = function(shot_num, shot_type, location, movement, equipment, description, details) {
		$http.get("ajax/addShot.php?shot_num="+shot_num+"&shot_type="+shot_type+"&location"+location+"&movement="+movement+"&equipment="+equipment+"&description="+description+"&details="+details).success(function(data) {
			getShot();
			//need to empty the form then here
		});
	};

	//delete a task from the db
	$scope.deleteTask = function(shot) {
		if(confirm("Are you sure to delete this shot?")) {
			$http.get("ajax.deleteShot?shot_id="+shot).success(function(data) {
				getShot();
			});
		}
	};

	//toggle the status of a shot
	$scope.toggleStatus = function(item, status) {
		if(status == '2'){
			status = '0';
		}
		else {
			status = '2';
		}
		$http.get("ajax/updateTask.php?shot_id="+item+"&status="+status).success(function(data) {
			getShot();
		});
	};
});