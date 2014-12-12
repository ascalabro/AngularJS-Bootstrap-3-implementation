angular.module("mainApp").controller('webDesignCtrl', function($scope, $stateParams) {
    $scope.parms = $stateParams;
    $scope.firstName="John",
    $scope.lastName="Doe";
});