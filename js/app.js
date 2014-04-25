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
	$scope.addShot = function(shot_num, shot_type, movement, description) {
		$http.get("ajax/addShot.php?shot_num="+shot_num+"&shot_type="+shot_type+"&movement="+movement+"&description="+description).success(function(data) {
			getShot();
			$scope.shot_num_input = "";
			$scope.shot_type_input = "";
			$scope.movement_input = "";
			$scope.description_input = "";
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


/*Define an angular module for app
var app = angular.module('myApp', []);

app.controller('shotsContoller', function($scope, $http) {
	getShot();

	function getShot() {
		$http.get("ajax/getShot.php").success(function(data) {
			$scope.shots = data;
		});
	};

	$scope.deleteShot = function(shot_id) {
		if(confirm("Are you sure you want to delete this shot?")) {
			$http.get("ajax/deleteShot.php?shot_id="+shot_id).success(function(data) {
				getShot();
			});
		}
	};

	$scope.toggleStatus = function(item, status, description) {
		if(status=='2') {
			status='0';
		}
		else {
			status='2';
		}
		$http.get("ajax/updateShot.php?shot_id="+item+"&status="+status).success(function(data) {
			getShot();
		});
	};
});*/