app.controller('storeMainCtrl', function($scope, categoryFactory) {
    $scope.categories = categoryFactory.list.active();
    $scope.firstName = 'storeMainCtrl firstname';
});