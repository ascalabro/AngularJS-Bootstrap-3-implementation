angular.module('mainApp').factory('listingsFactory', function($http) {
    return {
        list: function(type, callback) {
            switch (type) {
                case "laptops":
                    $http.get('http://api.southeast.club/index.php?r=affableListings/getAllLaptopListingsList', {
                        cache: true
                    }).success(callback);
                    break;
                case "diff":
                    alert("diff")
                    break;
                default:

            }
        },
        find: function(listing_id, callback) {
            $http.get('http://api.southeast.club/index.php?r=affableListings/getListing', {
                params: {listing_id: listing_id},
                cache: true
            }).success(callback);
        }
    };
});