/********************
 * 
 * Dropbox Options 
 * 
 *******************/
var options = {
// Required. Called when a user selects an item(s) in the Chooser.
    success: function(files) {
//      var listing_id = $("#listing_id").val());
        var assoc_listing_id = $("#listing_id").val();
        var new_files = [];
        var img_path = '';
        for (var i = 0; i < files.length; i++) {
            var url = files[i].link;
            var img_path = url.split("/s/")[1];
            img_path = "https://dl.dropboxusercontent.com/s/" + img_path + "?dl=1";
            new_files.push({
                url: img_path,
                assoc_listing_id: assoc_listing_id
            });
            $("body").append("<div class='preview_box'><img width='30%' data-assoc-listing-id='" + assoc_listing_id + "' class='preview' src='" + img_path + "'></div>");
        }
        $.ajax({
            type: "POST",
            url: "../lib/scripts/uploader.php",
            data: {data: new_files
            },
            success: function() {
                location.reload();
//                var data = jQuery.parseJSON(files_json);
//                for (var i = 0; i < data.length; i++){
//                    $(".image_box:last").after(
//                            "<div class='image_box'>" + 
//                            "<label>Path: </label><input type='text' disabled value='" + data[i].url + "'>" +
//                            "<img data-assoc-listing-id='" + data[i].assoc_listing_id + "' class='edit_img' src='" + data[i].url + "'>" +
//                            "<button data-img-id='" + data[i].img_id + "' class='delete_img_button' type='button'>Remove</button><button data-img-id='" + data[i].img_id + "' class='make_default_button' type='button'>Make Default</button>" +
//                            "</div>");
//                }
            }
        });
    },
    // Optional. Called when the user closes the dialog without selecting a file
    // and does not include any parameters.
    cancel: function() {
        alert('No image(s) selected.');
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
//                var assoc_listing_id = img.assoc_listing_id;
                $("#edit_default_img").attr("src", new_url);
//                setTimeout( function() { location.reload(); }, 0101); 
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


    $("#choose_file").click(function() {
        var new_files = Dropbox.choose(options);
    });
    

});