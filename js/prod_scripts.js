
$(document).on("click", "#listings_table .ajaxGet", function(event) {
    event.preventDefault();
//    alert($('table').parent().attr('id'));
    var container = $('table').parent();
    var prevContent = container.html();
    // $('#tabs').tabs({ active: 4 });
    var querystring = 'listing_id=' + $(this).attr('href');
    $.get('lib/classes/products_page.php', querystring, function(data) {
        //set html in div to data returned by server 
        container.html(data);
    });

});


$('.back').on("click", function(event) {
    event.preventDefault();
    $.get('lib/classes/products_page.php', function(data) {
        $('table').parent().html(data);
    });
});
var main_img = $('.gallery-main-img');

$('.gallery_thumb').hover(function() {
    main_img.stop();
    var hvr_src = $(this).attr('src');
    main_img.attr('src', hvr_src).fadeIn('medium');
},
        function(hvr_src) {
//           main_img.attr('src', hvr_src);
        });


// $(function() {   
//    $("#listings_table .ajaxGet").click(function(){
//       alert(); 
//    });
//    $('#listings_table .ajaxGet').on( "click", function(event) {
//        event.preventDefault();
//        var container = $('table').parent();
//        var prevContent = container.html();
//       // $('#tabs').tabs({ active: 4 });
//        var querystring = 'listing_id=' + $( this ).attr('href');
//        $.get('products.php', querystring, function(data) {
//            //set html in div to data returned by server 
//            container.html(data);
//        }); 
//        
//    });
//    
//    $('.back').click(function(event){
//        event.preventDefault();
//        $.get('products.php','',function(data){
//           $('table').parent().html(data); 
//        });
//    });
//    
//    
//    
//    
//       $('.gallery_thumb').hover(
//    function () {
//        $('#gallery-main-img').stop();
//        var hvr_src = $(this).attr('src');
//        $('#gallery-main-img').attr('src',hvr_src).css("display", "none").fadeIn('medium');
//    }, 
//    function (hvr_src) {
//        ('#gallery-main-img').attr('src',hvr_src);
//    });  
//    
//    
//});