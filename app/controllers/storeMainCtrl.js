angular.module('mainApp').controller('storeMainCtrl', function($scope, $stateParams, listingsFactory) {
    listingsFactory.getActiveCategories(function(categories) {
        $scope.categories = categories;
    });
    $scope.firstName = 'Joaaaahn';
    $scope.lastName = 'Doe';
});