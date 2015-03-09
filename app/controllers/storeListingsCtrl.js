app.controller('storeListingsCtrl', function($scope, $stateParams, listingFactory) {
    $scope.listings = listingFactory.list.byCategory({category_id: $stateParams.category_id});
//    $scope.categoryName = $scope.listings;
});;