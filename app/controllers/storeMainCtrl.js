angular.module("mainApp").controller('storeMainCtrl', function($scope, $stateParams, listingsFactory) {
    $scope.parms = $stateParams;
    $scope.laptopList = listingsFactory.list(function(listings) {
        $scope.listings = listings;
    });
    $scope.firstName="Joahn";
    $scope.lastName="Doe";
});