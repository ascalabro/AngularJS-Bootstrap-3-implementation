angular.module("mainApp").factory('listingsFactory', function($http) {
    return {
        list: function(callback) {
            $http.get('http://api.southeast.club/index.php?r=affableListings/getAllComputerListingsList', {
                cache: true
            }).success(callback);
        },
        find: function(listing_id, callback) {
            $http.get('http://api.southeast.club/index.php?r=affableListings/getComputerListing', {
                params: {listing_id: listing_id},
                cache: true
            }).success(callback);
        }
    };
});