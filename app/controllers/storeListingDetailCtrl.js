app.controller('storeListingDetailCtrl', function($scope, $stateParams, listingFactory) {
    $scope.listing = listingFactory.query.get({listing_id: $stateParams.listing_id});
});