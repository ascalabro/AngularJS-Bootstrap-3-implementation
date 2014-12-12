
/*
 * These global constants will be used to save text
 */
VIEW_PATH = 'app/views';

angular.module('mainApp', [
    'ui.router'
])
        .config(['$stateProvider', '$urlRouterProvider', function(stateProvider, urlRouterProvider) {
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
                    .state('webDesign.about',{
                        url : '/about',
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
                        url: '/list/{type}',
                        parent: 'store',
                        templateUrl: VIEW_PATH + '/store/list.html',
                        controller: 'storeListingsCtrl'
                    })
                    .state('store.list.laptops', {
                        url: '/laptops',
                        parent: 'store.list',
                        templateUrl: VIEW_PATH + '/store/laptops.html',
                        controller: 'storeMainCtrl'
                    })
                    .state('store.listing', {
                        url: '/:id',
                        parent: 'store',
                        templateUrl: VIEW_PATH + '/store/listing.html',
                        controller: 'storeListingDetailCtrl'
                    })
                    ;
            urlRouterProvider.otherwise('/home');
        }])
        .run(['$rootScope', '$state', '$stateParams', function(rootScope, state, stateParams) {
            rootScope.$state = state;
            return rootScope.$stateParams = stateParams;
        }]);