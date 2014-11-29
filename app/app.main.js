angular.module("mainApp", [
    'ui.router'
])
        .config(function($stateProvider, $urlRouterProvider) {
            $stateProvider
                    .state('home', {
                        url: '/home',
                        templateUrl: 'app/views/home/home.html',
                        controller: function($scope, $state) {
                            $scope.title = "Affable Computer Services, Sales, Website Design";
                            $scope.$state = $state;
                        }
                    })
                    .state('computerServices', {
                        url: '/computerServices',
                        templateUrl: 'app/views/computerServices/computerServices.html',
                        controller: function($scope, $state) {
                            $scope.title = "Computer Services";
                            $scope.$state = $state;
                        }
                    })
                    .state('contact', {
                        url: '/contact',
                        templateUrl: 'app/views/contact/contact.html',
                        controller: function($scope, $state) {
//                    $scope.title = "Contact Us";
                            $scope.$state = $state;
                        }
                    })
        })
        .run([
            "$rootScope", "$state", "$stateParams", function($rootScope, $state, $stateParams) {
                $rootScope.$state = $state;
                return $rootScope.$stateParams = $stateParams;
            }
        ]);