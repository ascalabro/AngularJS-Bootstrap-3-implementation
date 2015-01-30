app.controller('storeListingDetailCtrl', function($scope, $stateParams, listingFactory, $sce) {
    $scope.listing = listingFactory.query.get({listing_id: $stateParams.listing_id});
    $scope.listing.description = $sce.trustAsHtml($scope.listing.description);
});