// JavaScript Document
$(document).on('ready', function() {
	
// TESTIMONIAL CAROUSEL
	  var owl = $("#owl-demo1");	 
	  owl.owlCarousel({
		  autoPlay: 4000,
		  items : 3, //10 items above 1000px browser width
		  itemsDesktop : [1920,2], //5 items between 1000px and 901px
		  itemsDesktopSmall : [900,1], // betweem 900px and 601px
		  itemsTablet: [600,1], //2 items between 600 and 0
		  itemsMobile : [380,1] 
	  });
	 
	  // Custom Navigation Events
	  $(".next").click(function(){
		owl.trigger('owl.next');
	  })
	  $(".prev").click(function(){
		owl.trigger('owl.prev');
	  })
	  $(".play").click(function(){
		owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
	  })
	  $(".stop").click(function(){
		owl.trigger('owl.stop');
	  })
	 
//CLIENT LOGO    
      var owl = $("#client-logo");
     
      owl.owlCarousel({
		   autoPlay: 4000,
        itemsCustom : [
        [0, 1],
        [450, 2],
        [600, 3],
        [700, 3],
        [1000, 4],
        [1200, 6],
        [1400, 6],
        [1600, 6]
      ]
      });
     
      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })
	 
	 //HEADER - OWL SLIDER 
    $("#owl-example").owlCarousel({
        autoPlay: 4000,
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: false,
        rewindSpeed: 500,
        afterMove: moved
    });

    $('.custom-control').on('click', 'button', function() {
        var $this = $(this);
        var slideNum = $(this).data('slide');
        $("#owl-example").trigger('owl.goTo', slideNum);
    });

    function moved() {
        var owl = $("#owl-example").data('owlCarousel');
        var $buttons = $('.custom-control button');
        $buttons.removeClass('active').removeAttr('disabled');
        $('.custom-control').find('[data-slide="' + owl.currentItem + '"]').addClass('active').attr('disabled', 'disabled');
    }

});