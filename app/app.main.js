/*
 * Main app file
 */

var app = angular.module('mainApp', [
    'ui.router',
    'dataService'
])
        .constant("config", {
            "pageTitle": "Affable IT Solutions - "
        })
        .config(['$stateProvider', '$urlRouterProvider', "config", function(stateProvider, urlRouterProvider) {
                stateProvider
                        .state('home', {
                            url: '/home',
                            templateUrl: app.config.viewPath + '/home/index.html',
                            controller: function($scope) {
                                $scope.pageTitle = ($scope.pageTitle).concat('Home'); // not yet being used
                            }
                        })
                        .state('computerServices', {
                            url: '/computerServices',
                            templateUrl: app.config.viewPath + '/computerServices/index.html',
                            controller: function($scope, $state) {
                                $scope.title = 'Computer Services';
                                $scope.$state = $state;
                            }
                        })
                        .state('contact', {
                            url: '/contact',
                            templateUrl: app.config.viewPath + '/contact/index.html',
                            controller: function($scope, $state) {
                                $scope.$state = $state;
                            }
                        })
                        .state('webDesign', {
                            url: '/webDesign',
                            templateUrl: app.config.viewPath + '/webDesign/index.html'
                        })
                        .state('webDesign.about', {
                            url: '/about',
                            parent: 'webDesign',
                            templateUrl: app.config.viewPath + '/webDesign/about.html'
                        })
                        .state('webDesign.portfolio', {
                            url: '/portfolio',
                            parent: 'webDesign',
                            templateUrl: app.config.viewPath + '/webDesign/portfolio.html'
                        })
                        .state('webDesign.pricing', {
                            url: '/pricing',
                            parent: 'webDesign',
                            templateUrl: app.config.viewPath + '/webDesign/pricing.html'
                        })
                        .state('store', {
                            url: '/store',
                            templateUrl: app.config.viewPath + '/store/index.html',
                            controller: 'storeMainCtrl'
                        })
                        .state('store.list', {
                            url: '/list/{category_id}',
                            parent: 'store',
                            category_id: '{category_id}',
                            templateUrl: app.config.viewPath + '/store/list.html',
                            controller: 'storeListingsCtrl'
                        })
                        .state('store.listing', {
                            url: '/listing/:listing_id',
                            parent: 'store',
                            templateUrl: app.config.viewPath + '/store/listing.html',
                            controller: 'storeListingDetailCtrl'
                        })
                        ;
                urlRouterProvider.otherwise('/home');
            }])
        .run(['$rootScope', '$state', '$stateParams', 'config', function(rootScope, state, stateParams, config) {
                rootScope.$state = state;
                rootScope.pageTitle = config.pageTitle;
                return rootScope.$stateParams = stateParams;
            }]);
