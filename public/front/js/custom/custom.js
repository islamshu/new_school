/*========================================== MASTER JAVASCRIPT ===================================================================

	Project     :	INSIGHT TEMPLATES
	Version     :	1.0
	Last Change : 	13/06/2017
	Primary Use :   INSIGHT TEMPLATES

=================================================================================================================================*/
$(document).on('ready', function() {
    "use strict"; //Start of Use Strict
    var menu_bar = $('.navbar-default');
    var menu_li = $('.navbar-default li a');
    var collapse = $('.navbar-collapse');
    var navbar_header = $('.navbar_header button');
    var top_nav = $('#top-nav');
    var top_menu = $('.header-menu-1');

    //MENU-1 SCROLL
    if (top_menu.length) {
        var x = $(".header-menu-1").offset().top;
        var topx = (x - $(window).scrollTop());
		//alert(topx);
        if (topx < 50) {
			
				   menu_bar.fadeIn().addClass('fixed-header').css({
                    "background-color": "#ffffff",
                    "color": "#333333",
                    "box-shadow": "0 0 5px rgba(0, 0, 0, 0.3) !important",
                    "z-index": "99999"
                });
                menu_li.css({
                    "color": "#333333"
                });
        } else {
                menu_bar.removeClass('fixed-header').css({
                    "background-color": "transparent",
                    "color": "#ffffff",
                    "box-shadow": "0 0 5px rgba(0, 0, 0, 0.3) !important"
                });
                menu_li.css({
                    "color": "#333333"
                });
            }
        $(document).on('scroll', function() {
            var y = $(window).scrollTop();

            if (y >= 230) {
                menu_bar.fadeIn().addClass('fixed-header').css({
                    "background-color": "#ffffff",
                    "color": "#333333",
                    "box-shadow": "0 0 5px rgba(0, 0, 0, 0.3) !important",
                    "z-index": "99999"
                });
                menu_li.css({
                    "color": "#333333"
                });

            } else {
                menu_bar.removeClass('fixed-header').css({
                    "background-color": "transparent",
                    "color": "#ffffff",
                    "box-shadow": "0 0 5px rgba(0, 0, 0, 0.3) !important"
                });
                menu_li.css({
                    "color": "#333333"
                });
            }           
        });
    }
	
    //MENU-2 SCROLL
    if (top_nav.length) {
        var x = top_nav.offset().top;
        if (x > 50) {
            top_nav.fadeIn();
        } else {
            top_nav.fadeOut();
        }
        $(document).on('scroll', function() {
            var y = $(this).scrollTop();
            if (y > 50) {
                top_nav.fadeIn();
            } else {
                top_nav.fadeOut();
            }
        });
    }

    //RESPONSIVE MENU SHOW AND HIDE FUNCTION
    if (menu_li.length) {
        menu_li.on("click", function(event) {
            $('.navbar-inverse').addClass('in');
        });
    }
	
	$("body").on("click", function(event) {
           $('.navbar-inverse').addClass('in');
      });

    //SIDEBAR RESONSIVE MENU
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
	 if (sideslider.length) {
		 sideslider.on("click", function(event) {
			event.stopPropagation();
			$(sel).toggleClass('in');
			$(sel2).toggleClass('out');
		});
	 }

    //MENU BAR SMOOTH SCROLLING FUNCTION
    var menu_list = $('.navbar-nav');
    if (menu_list.length) {
        menu_list.on("click", ".pagescroll", function(event) {
            event.stopPropagation();
			event.preventDefault();
            var hash_tag = $(this).attr('href');
            if ($(hash_tag).length) {
                $('html, body').animate({
                    scrollTop: $(hash_tag).offset().top - 50
                }, 2000);
            }
            return false;
        });
    }

    //COUNTER
    var counter = $('.count');
    if (counter.length) {
        counter.counterUp({
            delay: 10,
            time: 1000
        });
    }

    //GALLERY POPUP
    var gallery = $('.popup-gallery');
    if (gallery.length) {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                }
            }
        });
    }

    //CONTACT FORM VALIDATION	
    if ($('.contact-form-1').length) {
        $('.contact-form-1').each(function() {
            $(this).validate({
                errorClass: 'error',
                submitHandler: function(form) {
                    $.ajax({
                        type: "POST",
                        url: "mail/mail.php",
                        data: $(form).serialize(),
                        success: function(data) {
                            if (data) {
                                $('.sucessMessage').html('Mail Sent Successfully !');
                                $('.sucessMessage').show();
                                $('.sucessMessage').delay(3000).fadeOut();
                            } else {
                                $('.failMessage').html(data);
                                $('.failMessage').show();
                                $('.failMessage').delay(3000).fadeOut();
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $('.failMessage').html(textStatus);
                            $('.failMessage').show();
                            $('.failMessage').delay(3000).fadeOut();
                        }
                    });
                }
            });
        });
    }

    // YOUTUBE BACKGROUND VIDEO FUNCTION	
    var player = $('.player');
    if (player.length) {
        player.mb_YTPlayer();
    }

    //FAQ ACCORDION
    var faq = $(".faq-row");
    if (faq.length) {
        faq.each(function() {
            var all_panels = $(this).find('.faq-ans').hide();
            var all_titles = $(this).find('.faq-title');
            $(this).find('.faq-ans.active').slideDown();

            all_titles.on("click", function() {
                var acc_title = $(this);
                var acc_inner = acc_title.next();

                if (!acc_inner.hasClass('active')) {
                    all_panels.removeClass('active').slideUp();
                    acc_inner.addClass('active').slideDown();
                    all_titles.removeClass('active');
                    acc_title.addClass('active');
                } else {
                    all_panels.removeClass('active').slideUp();
                    all_titles.removeClass('active');
                }
            });
        });
        $(".faq-row .faq-title:eq(0)").trigger('click');
    }

   //DIV FLIP - CASE STUDIES
    $(".flip").flip({
        trigger: 'hover'
    });
    return false;
    // End of use strict
});