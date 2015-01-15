angular.module('mainApp').factory('listingsFactory', function($http) {
    return {
        getActiveListings: function(category_id, callback) {
            if (!category_id) {
                $http.get(config.data_services_url + '/index.php?r=affableListings/getListingsComplete', {
                    cache: true
                }).success(callback);
            } else {
                $http.get(config.data_services_url + '/index.php?r=affableListings/getListingsByCategory', {
                    params: {category_id: category_id},
                    cache: true
                }).success(callback);
            }
        },
        find: function(listing_id, callback) {
            $http.get(config.data_services_url + '/index.php?r=affableListings/getListingDetailComplete', {
                params: {listing_id: listing_id},
                cache: true
            }).success(callback);
        },
        getActiveCategories: function(callback) {
            $http.get(config.data_services_url + '/index.php?r=affableListings/getActiveCategoriesComplete', {
                cache: true
            }).success(callback);
        }
    };
});