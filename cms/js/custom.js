$("document").ready(function() {
    $('#listing_form').submit(function() {
        var listing_id = $("#listing_id").val();
        var script_url = "../lib/scripts/edit_listing.php";
        var is_new_listing = $(".new_listing_value").val();

        if (is_new_listing == "TRUE") {
            $.ajax({
                type: "POST",
                url: script_url,
                data: $("#listing_form").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    alert("Listing Saved Successfully");
                    window.location.replace("?listing_id=" + data);
                },
                error: function() {
                    alert("Failure saving listing.");
                }
            });
            return false;
        } else if (is_new_listing == "FALSE") {
            $.ajax({
                type: "POST",
                url: script_url,
                data: $("#listing_form").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    alert("Listing Saved Successfully");
                },
                error: function() {
                    alert("Failure saving listing.");
                }
            });
            return false;
        } else {
            alert("Error");
        }
        // avoid to execute the actual submit of the form.
    });

});
