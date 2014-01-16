$(function() {
    $( "#accordion" ).accordion({
      collapsible: true,
      active: false,
      autoHeight: false
    });
  });


$(document).ready(function() {


    var startingHeight = $('header').css('height');

    //header mouseover
    $('header').hover(function() {
        var headHoverHeight = '73px';
        $(this).stop().animate({height: headHoverHeight}, 300,function(){$('.my_info_top').fadeIn().css('display','block');});
        
    }, function() {
        $('.my_info_top').css('display','none');
        $(this).stop().animate({height: startingHeight}, 300);
    });
    var defaultColor = $('header nav ul li a').css('color');
    
    $('header nav ul li a').click(function(){
        $('header').stop().css('height',startingHeight);
    });
    
    
    
    
    var container = $('.ErrContainer');
    // validate the form when it is submitted
    var validator = $("#contact_form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: false,
                    digits: true,
                    minlength: 7,
                    maxlength: 10
                },
                message: {
                    required: true
                }
            },
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            submitHandler : function(form){
            ///////////////////////////////// BEGIN submitHandler ////////////////////////////////////
                /* get some values from elements on the page and POST with $.post() */
                $.post('contact.php', {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    message: $('#message').val()
                }, function(d){
                    // after form is sumbitted, reset the form & disable submit
                    $('#contact_form').hide();
                    $('#ty_msg').html('<h4>Thank you for contacting me!</h4>')

                });
            }
            /////////////////////////////////// END submitHandler ////////////////////////////////////
    });
    
    
    
    
    
    
    
    
    

});