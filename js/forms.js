 $(document).ready(function () {

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
                area_code: {
                    required: false,
                    digits: true,
                    minlength: 3,
                    maxlength: 4
                },
                phone_number: {
                    required: false,
                    digits: true,
                    minlength: 7,
                    maxlength: 7
                }
            },
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            submitHandler : function(form){
            // BEGIN submitHandler ////////////////////////////////////
                /* get the checkboxes which are checked and put them into array*/
                var interests = [];
                $.each($('.form_checkbox:checked'), function() {
                    interests.push($(this).val()); 
                });
                if(interests.length == 0) { 
                    interests.push("N/A"); 
                }   
                /* END of get checkboxes */

                /* get some values from elements on the page and POST with $.post() */
                $.post('email_form.php', {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    area_code: $('#area_code').val(),
                    phone_number: $('#phone_number').val(),
                    interests: interests,
                    text: $('#gen_ques').val()
                }, function(d){
                    // after form is sumbitted, reset the form & disable submit
                    $("#reset").click();
                    $('input[type="submit"]').prop('disabled',true);
                    alert('Thank you for contacting us.');

                });
            }
            // END submitHandler ////////////////////////////////////
    });

    $('input:not(input[type=submit],input[type=reset]),textarea').each(function(){

        var new_shadow = 'inset 1px 1px 1px 1px #5A90A6, 6px 2px 6px rgba(0,0,0,0.1) ';
        var old_style = {
            'box-shadow' : $(this).css('box-shadow') ,
            'background-color' : $(this).css('background-color')
        };
        var focus_style = {
            'box-shadow' : new_shadow,
            'background-color' : 'rgba(90, 144, 166,0.4)'
        };

        var hasValStyl = {
            'box-shadow' : new_shadow,
            'background-color' : 'rgb(190, 211, 214)'
        };
        $(this).focus(function(){
            $(this).css(focus_style);
        });
        $(this).blur(function(){
            $(this).css(old_style);
              if($(this).add('input[type=checkbox]:checked').val()){
                    $(this).css(hasValStyl);
            }
        });


    });

    $("#reset").click(function() {
        validator.resetForm();
    });
//    background-color:rgba(255,204,0,0.8);
    $('input[type=submit],input[type=reset]').hover(function(){
        $(this).stop().animate({backgroundColor:'#D4E9FF'}, 300);
    }, function () {
        $(this).stop().animate({backgroundColor:'white'}, 100);  
    });


});

