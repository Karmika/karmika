app.controller("HomeController",['$scope','$http','$window','config',
	function ($scope,$http,$window,config) {
	$scope.baseUrl = config.baseUrl;
	$scope.Back = function(){ 
		$window.history.back();
	}

	$scope.pageSelectionData = config.perPageRowSelectionData;
	$scope.selectedRowsPerPage = 5;
	
	$scope.ChagePageVal = function(NumberOfRowsperPage){
		$scope.selectedRowsPerPage = NumberOfRowsperPage;
	}
}])