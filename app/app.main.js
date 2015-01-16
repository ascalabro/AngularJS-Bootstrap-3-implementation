
/*
 * These global constants will be used to save typing
 */
VIEW_PATH = 'app/views';

var app = angular.module('mainApp', [
    'ui.router',
    'ngResource'
])
        .config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function(stateProvider, urlRouterProvider, locationProvider) {
                stateProvider
                        .state('home', {
                            url: '/home',
                            templateUrl: VIEW_PATH + '/home/index.html',
                            controller: function($scope, $state) {
                                $scope.title = 'Affable Computer Services, Sales, Website Design';
                                $scope.$state = $state;
                            }
                        })
                        .state('computerServices', {
                            url: '/computerServices',
                            templateUrl: VIEW_PATH + '/computerServices/index.html',
                            controller: function($scope, $state) {
                                $scope.title = 'Computer Services';
                                $scope.$state = $state;
                            }
                        })
                        .state('contact', {
                            url: '/contact',
                            templateUrl: VIEW_PATH + '/contact/index.html',
                            controller: function($scope, $state) {
                                $scope.$state = $state;
                            }
                        })
                        .state('webDesign', {
                            url: '/webDesign',
                            templateUrl: VIEW_PATH + '/webDesign/index.html'
                        })
                        .state('webDesign.about', {
                            url: '/about',
                            parent: 'webDesign',
                            templateUrl: VIEW_PATH + '/webDesign/about.html'
                        })
                        .state('webDesign.portfolio', {
                            url: '/portfolio',
                            parent: 'webDesign',
                            templateUrl: VIEW_PATH + '/webDesign/portfolio.html'
                        })
                        .state('webDesign.pricing', {
                            url: '/pricing',
                            parent: 'webDesign',
                            templateUrl: VIEW_PATH + '/webDesign/pricing.html'
                        })
                        .state('store', {
                            url: '/store',
                            templateUrl: VIEW_PATH + '/store/index.html',
                            controller: 'storeMainCtrl'
                        })
                        .state('store.list', {
                            url: '/list/{category_id}',
                            parent: 'store',
                            category_id: '{category_id}',
                            templateUrl: VIEW_PATH + '/store/list.html',
                            controller: 'storeListingsCtrl'
                        })
                        .state('store.listing', {
                            url: '/listing/:listing_id',
                            parent: 'store',
                            templateUrl: VIEW_PATH + '/store/listing.html',
                            controller: 'storeListingDetailCtrl'
                        })
                        ;
                urlRouterProvider.otherwise('/home');

                // Turn on HTML 5 mode
                locationProvider.html5Mode(true);
            }])
        .run(['$rootScope', '$state', '$stateParams', function(rootScope, state, stateParams) {
                rootScope.$state = state;
                return rootScope.$stateParams = stateParams;
        }]);
