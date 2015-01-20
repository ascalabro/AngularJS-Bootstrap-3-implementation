service.factory('listingFactory', function($resource) {
    return {
        list: $resource(
                app.config["params"].data_services_url + '/index.php?r=affableListings/listing',
                {},
        {
            "all": {method: "GET", isArray: true},
            "byCategory": {method: "GET", "params": {category_id: "category_id"}, isArray: true}
        }),
        query: $resource( app.config["params"].data_services_url + '/index.php?r=affableListings/listing&listing_id=:listing_id')
    };
});