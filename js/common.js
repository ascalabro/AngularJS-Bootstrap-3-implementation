
$(document).ready(function(){
    $(window).one("scroll",function() { document.body.scrollTop = document.documentElement.scrollTop = 0; });
     var tabs = $('#tabs'),
    
    // This selector will be reused when selecting actual tab widget A elements.
    tab_a_selector = 'ul.ui-tabs-nav a';
  
  // Enable tabs on all tab widgets. The `event` property must be overridden so
  // that the tabs aren't changed on click, and any custom event name can be
  // specified. Note that if you define a callback for the 'select' event, it
  // will be executed for the selected tab whenever the hash changes.
  tabs.tabs({ event: 'change' }).addClass( "ui-tabs-vertical ui-helper-clearfix" );
    tabs.find( tab_a_selector ).click(function(){
    var state = {},
      
      // Get the id of this tab widget.
      id = $(this).closest( '#tabs' ).attr( 'id' ),
      
      // Get the index of this tab.
      idx = $(this).parent().prevAll().length;
    
    // Set the state!
    state[ id ] = idx;
    $.bbq.pushState( state );
  });
  
  // Bind an event to window.onhashchange that, when the history state changes,
  // iterates over all tab widgets, changing the current tab as necessary.
  $(window).bind( 'hashchange', function(e) {
    
    // Iterate over all tab widgets.
    tabs.each(function(){
      
      // Get the index for this tab widget from the hash, based on the
      // appropriate id property. In jQuery 1.4, you should use e.getState()
      // instead of $.bbq.getState(). The second, 'true' argument coerces the
      // string value to a number.
      var idx = $.bbq.getState( this.id, true ) || 0;
      
      // Select the appropriate tab for this tab widget by triggering the custom
      // event specified in the .tabs() init above (you could keep track of what
      // tab each widget is on using .data, and only select a tab if it has
      // changed).
      $(this).find( tab_a_selector ).eq( idx ).triggerHandler( 'change' );
    });
  });
  
  // Since the event is only triggered when the hash changes, we need to trigger
  // the event now, to handle the hash the page may have loaded with.
  $(window).trigger( 'hashchange' );
    
    
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    $(".external_link").unbind('click');
    
   
    $(".open-tab").click(function(e){
        e.preventDefault();
        var tab = $(this).attr("href");
        $("#tabs").tabs("select", tab);
        $('.ui-tabs-nav li').css("background-color","#56B2C4");
        $("html, body").animate({ scrollTop: 235 }, "slow");
    });
    
    $('.ui-tabs-vertical .ui-tabs-nav li').hover( 
            function(){ 
                if(!($(this).hasClass('ui-tabs-active'))){
                    $(this).filter(':not(:animated)').animate({backgroundColor:'#D0D4C9'}, { duration: 200, queue: false });
                } else{
                    $(this).css('background-color','#BFCEE6');
                }
            }, 
            function(){
                if(!($(this).hasClass('ui-tabs-active'))){
                    $(this).animate({backgroundColor:'#56B2C4'},{ duration: 200, queue: false });
                }
            });
            
            $('.ui-tabs-nav li ').click(function(){
                $(this).animate({backgroundColor:'#BFCEE6'}, { duration: 200, queue: false });
                $(this).siblings().css("background-color","#56B2C4");
            });
            
            
            
            
            
            
        var timer = $.timer(function() {
            topBanner = $("#topbanner");
            topBanner.attr('src', 'images/affbanner_0101.png');
            topBanner.hover(function(){
               topBanner.attr('src', 'images/output_6mJhzw.gif');
            }, function(){
               topBanner.attr('src', 'images/affbanner_0101.png');
            });
        });

        timer.set({ time : 6000, autostart : true });
        timer.play(reset);  // Boolean. Defaults to false.
        timer.pause();
        timer.stop();  // Pause and resets
        timer.toggle(reset);  // Boolean. Defaults to false.
        timer.once(time);  // Number. Defaults to 0.
        timer.isActive;  // Returns true if timer is running
        timer.remaining; // Remaining time when paused
        
        
        
        
        
        
});



  ////////////////////////////////////////////
  /////////////// BEGIN BBQ js for back button use in jQuery tabs and initialize tabs
  ////////////////////////////////////////////

$(function(){
  
  // The "tab widgets" to handle.
  var tabs = $('#tabs'),
    
    // This selector will be reused when selecting actual tab widget A elements.
    tab_a_selector = 'ul.ui-tabs-nav a';
  
  // Enable tabs on all tab widgets. The `event` property must be overridden so
  // that the tabs aren't changed on click, and any custom event name can be
  // specified. Note that if you define a callback for the 'select' event, it
  // will be executed for the selected tab whenever the hash changes.
  tabs.tabs({ event: 'change' });
  
  // Define our own click handler for the tabs, overriding the default.
  tabs.find( tab_a_selector ).click(function(){
    var state = {},
      
      // Get the id of this tab widget.
      id = $(this).closest( '.tabs' ).attr( 'id' ),
      
      // Get the index of this tab.
      idx = $(this).parent().prevAll().length;
    
    // Set the state!
    state[ id ] = idx;
    $.bbq.pushState( state );
  });
  
  // Bind an event to window.onhashchange that, when the history state changes,
  // iterates over all tab widgets, changing the current tab as necessary.
  $(window).bind( 'hashchange', function(e) {
    
    // Iterate over all tab widgets.
    tabs.each(function(){
      
      // Get the index for this tab widget from the hash, based on the
      // appropriate id property. In jQuery 1.4, you should use e.getState()
      // instead of $.bbq.getState(). The second, 'true' argument coerces the
      // string value to a number.
      var idx = e.getState( this.id, true ) || 0;
      
      // Select the appropriate tab for this tab widget by triggering the custom
      // event specified in the .tabs() init above (you could keep track of what
      // tab each widget is on using .data, and only select a tab if it has
      // changed).
      $(this).find( tab_a_selector ).eq( idx ).triggerHandler( 'change' );
    });
  });
  
  // Since the event is only triggered when the hash changes, we need to trigger
  // the event now, to handle the hash the page may have loaded with.
  $(window).trigger( 'hashchange' );
  ////////////////////////////////////////////
  /////////////// END OF BBQ js for back button use in jQuery tabs
  ////////////////////////////////////////////
  
  
  
});