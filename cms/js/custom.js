$("document").ready(function() {
    $('.editor_button').click(function() {
        var value_string = $(this).attr('value');
        var listing_id = $(this).data('listing-id');
        if (value_string == 'Edit') {
            var edit_listing_page = "?listing_id=" + listing_id;
            window.location = edit_listing_page;
        }
        else if (value_string == 'Delete') {
            $.get(
                '../lib/scripts/delete_listing.php',
                {listing : listing_id}
            ).done(function(data){
                alert('Successfully deleted listing with ID: ' + listing_id);
            });
        } else {
            alert('off');
        }
    });
});