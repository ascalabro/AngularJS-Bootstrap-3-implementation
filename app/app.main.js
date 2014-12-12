angular.module("mainApp", [
    'ui.router'
])
        .config(['$stateProvider', '$urlRouterProvider', function(stateProvider, urlRouterProvider) {
            stateProvider
                    .state('home', {
                        url: '/home',
                        templateUrl: 'app/views/home/index.html',
                        controller: function($scope, $state) {
                            $scope.title = "Affable Computer Services, Sales, Website Design";
                            $scope.$state = $state;
                        }
                    })
                    .state('computerServices', {
                        url: '/computerServices',
                        templateUrl: 'app/views/computerServices/index.html',
                        controller: function($scope, $state) {
                            $scope.title = "Computer Services";
                            $scope.$state = $state;
                        }
                    })
                    .state('contact', {
                        url: '/contact',
                        templateUrl: 'app/views/contact/index.html',
                        controller: function($scope, $state) {
                            $scope.$state = $state;
                        }
                    })
                    .state('webDesign', {
                        url: '/webDesign',
                        templateUrl: 'app/views/webDesign/index.html'
                    })
                    .state('webDesign.about',{
                        url : '/about',
                        parent: 'webDesign',
                        templateUrl: 'app/views/webDesign/about.html'
                    })
                    .state('webDesign.portfolio', {
                        url: '/portfolio',
                        parent: 'webDesign',
                        templateUrl: 'app/views/webDesign/portfolio.html'
                    })
                    .state('webDesign.pricing', {
                        url: '/pricing',
                        parent: 'webDesign',
                        templateUrl: 'app/views/webDesign/pricing.html'
                    })
                    .state('store', {
                        url: '/store',
                        templateUrl: 'app/views/store/index.html',
                        controller: 'storeMainCtrl'
                    })
                    ;
            urlRouterProvider.otherwise('/home');
        }])
        .run(['$rootScope', '$state', '$stateParams', function(rootScope, state, stateParams) {
            rootScope.$state = state;
            return rootScope.$stateParams = stateParams;
        }]);