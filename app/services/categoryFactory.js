service.factory('categoryFactory', function($resource) {
    return {
        list: $resource(
                app.config['params'].data_services_url + "/index.php?r=affableListings/category",
                {status_id: 1},
        {
            "all": {method: "GET", params: {}, isArray: true},
            "active": {method: "GET", params: {status_code: 1}, isArray: true},
            "inactive": {method: "GET", params: {status_code: 0}, isArray: true}
        }
        )
    };
});