angular.module('mainApp').controller('storeListingDetailCtrl', function($scope, $stateParams, listingsFactory) {
    listingsFactory.find($stateParams.listing_id, function(listing) {
        $scope.listing = listing;
    });
    $scope.firstName='Jaaaoahdn';
    $scope.stateParamslisting_id='id: ' + $stateParams.listing_id;
    console.log($scope.listing);
});