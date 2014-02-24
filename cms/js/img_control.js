/********************
 * 
 * Dropbox Options 
 * 
 *******************/
var options = {
// Required. Called when a user selects an item in the Chooser.
    success: function(files) {
        alert($("#listing_id").val());
        var assoc_listing_id = $("#listing_id").val();
        for (var i = 0; i < files.length; i++) {
            var url = files[i].link;
            var img_path = url.split("/s/")[1];
            var update_path = "https://dl.dropboxusercontent.com/s/" + img_path + "?dl=1";
            $("#pending_new_images").append("<div class='preview_box'><img width='30%' data-assoc-listing-id='" + assoc_listing_id + "' class='preview' src='" + update_path + "'></div>");
        }
//        $.ajax({
//            type: "POST",
//            url: "../lib/scripts/dropbox_comm.php",
//            data: {
//                link: new_img_url,
//                assoc_listing_id: assoc_listing_id
//            },
//            success: function(file) {
//                var data = jQuery.parseJSON(file);
//                $('.image_box').append("<div class='image_box'>" +
//                        "<label>Path: </label><input type='text' disabled value='" + data.link + "'>" +
//                        "<img data-assoc-listing-id='" + data.assoc_listing_id + "' class='edit_img' src='" + data.link + "'>" +
//                        "<button data-img-id='" + data.img_id + "' class='delete_img_button' type='button'>Remove</button><button data-img-id='" + data.img_id + "' class='make_default_button' type='button'>Make Default</button>" +
//                        "</div>");
//            }
//        });
    },
    // Optional. Called when the user closes the dialog without selecting a file
    // and does not include any parameters.
    cancel: function() {
        //$('#no-image-error-text').show();
    },
    // Optional. "preview" (default) is a preview link to the document for sharing,
    // "direct" is an expiring link to download the contents of the file. For more
    // information about link types, see Link types below.
    linkType: "preview", // or "direct"

    // Optional. A value of false (default) limits selection to a single file, while
    // true enables multiple file selection.
    multiselect: true, // or true

    // Optional. This is a list of file extensions. If specified, the user will
    // only be able to select files with these extensions. You may also specify
    // file types, such as "video" or "images" in the list. For more information,
    // see File types below. By default, all extensions are allowed.
    extensions: ['.jpg', '.bmp', '.jpeg', '.png', '.gif'],
};
/**********************
 * 
 * END Dropbox Options
 * 
 **********************/



$(document).ready(function() {

    /*
     * "make default" button click event handler
     */
    $(".make_default_button").click(function() {
        var new_default_img_path = $(this).closest(".image_box").find("img:first").attr("src");
        var assoc_listing_id = $(this).closest(".image_box").find("img:first").data("assoc-listing-id");
        $.ajax({
            type: "GET",
            url: "../lib/scripts/edit_img.php",
            data: {
                new_default_image: new_default_img_path,
                assoc_listing_id: assoc_listing_id
            },
            success: function(data) {
                var img = jQuery.parseJSON(data);
                var new_url = img.new_image_url;
                var assoc_listing_id = img.assoc_listing_id;
                $("#edit_default_img").attr("src", new_url);
                //  setTimeout( function() { location.reload(); }, 0101); 
            }
        });
    });
    /*
     * "delete" button click event handler
     */
    $('.delete_img_button').click(function() {
        var delete_img_id = $(this).data('img-id');
        $.ajax({
            type: "GET",
            url: "../lib/scripts/edit_img.php",
            data: {
                delete_img_id: delete_img_id
            },
            success: function(data) {
//               var data_success = data.status;
                setTimeout(function() {
                    location.reload();
                }, 0101);
            }
        });
    });


    var new_file = '';
    $("#choose_file").click(function() {
        var new_file = Dropbox.choose(options);
        $('body').append(new_file);
        $("#add_img_form input #file_url").val().append(new_file);
        /*$("input #file_url")$("body").append(file);*/
    });
    /*
     * "add image" button click event handler
     */
    $('#add_img_form').submit(function() {
        var patt = /[?=n]/m;
        $.ajax({
            type: "POST",
            url: script_url,
            data: $(this).serialize(),
            success: function(data) {
                alert("Image Added");
                alert(data);
            },
            error: function() {
                alert("Error saving image");
            }
        });
        return FALSE;
    });

});