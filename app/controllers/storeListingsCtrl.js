angular.module('mainApp').controller('storeListingsCtrl', function($scope, $stateParams, listingsFactory) {
    $scope.firstName = 'Joahnd';

    listingsFactory.getActiveListings($stateParams.category_id, function(listings) {
        $scope.listings = listings;
    });
});;