$(function(){
    
    if($(".wpcf7 input")){
        $(".wpcf7 input").each(function(){
            if($(this).val() != ""){
                $(this).attr("placeholder", $(this).val());
                $(this).val("");
            }
        });
        $(".wpcf7 textarea").each(function(){
            if($(this).html() != ""){
                $(this).attr("placeholder", $(this).html());
                $(this).html("");
            }
        });
    }
    if($("input[placeholder]")){
        iePlaceholder();
    }
    
    $('.banner-menu li:nth-child(3) a').addClass('disabled');
    $('.banner-menu li:nth-child(3) a').click(function(event){
        event.preventDefault();
    });
    
    $('.mobile-nav button').click(function(){
        $('.mobile-nav').toggleClass('open');
    })

    // Select dropdowns
    if ($('select').length) {
        // Traverse through all dropdowns
        $.each($('select'), function (i, val) {
            var $el = $(val);
             
            // If there's any dropdown with default option selected
            // give them `not_chosen` class to style appropriately
            // We assume default option to have a value of '' (empty string)
            if (!$el.val()) {
                $el.addClass("not_chosen");
            }
             
            // Add change event handler to do the same thing,
            // i.e., adding/removing classes for proper
            // styling. Basically we are emulating placeholder
            // behaviour on select dropdowns.
            $el.on("change", function () {
                if (!$el.val())
                    $el.addClass("not_chosen");
                else
                    $el.removeClass("not_chosen");
            });
             
            // end of each callback
      });
    }
    
    if($('.owl-carousel').length){
        $("#home-image-carousel").owlCarousel({
            singleItem:true,
            autoPlay: 7000,
            pagination: false,
            transitionStyle : "fade"
        });
    }


    function iePlaceholder(){
        $('[placeholder]').focus(function() {
          var input = $(this);
          if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
          }
        }).blur(function() {
          var input = $(this);
          if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
          }
        }).blur();
    }

});