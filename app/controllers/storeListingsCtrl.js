app.controller('storeListingsCtrl', function($scope, $stateParams, listingFactory) {
    $scope.firstName = 'storeListingsCtrl firstname';
    $scope.listings = listingFactory.list.byCategory({category_id: $stateParams.category_id});
});;