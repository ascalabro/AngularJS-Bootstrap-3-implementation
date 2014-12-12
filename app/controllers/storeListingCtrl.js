angular.module('mainApp').controller('storeListingCtrl', function($scope, $stateParams, listingsFactory) {
    $scope.parms = $stateParams;
    $scope.laptopList = listingsFactory.list(function(listings) {
        $scope.listings = listings;
    });
    $scope.firstName='Joahn';
    $scope.lastName='Doe';
});