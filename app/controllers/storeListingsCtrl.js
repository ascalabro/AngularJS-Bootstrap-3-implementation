angular.module('mainApp').controller('storeListingsCtrl', function($scope, $stateParams, listingsFactory) {
    $scope.parms = $stateParams;
    $scope.firstName = 'Joahnd';
    $scope.listings = listingsFactory.list($stateParams.type, function(listings) {
        $scope.listings = listings;
    });
});;