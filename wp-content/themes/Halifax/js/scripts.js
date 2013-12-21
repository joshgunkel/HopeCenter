jQuery(document).ready(function(){		
			
/* 	Dropdown menu		 */
/*
	
	jQuery(" #nav ul ").css({display: "none"}); // Opera Fix
	jQuery(" #nav li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"}).hide(300);
		});
	
*/

/* Sevices tabs	 */
	
	//jQuery( "#service-page" ).tabs();
	
	
/* MAsonry */
	
	var $container = jQuery('#full-content');
 
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.mason'
      });
    });


	
	
	
/* Responsive Menu	 */
	
	jQuery('#web2feel').mobileMenu();
	
	
/* Flexslider */
	
	jQuery('#slider').flexslider({
		         
	});
	
	
/* Carousel	 */
	
/*
	jQuery(".service-list").carouFredSel({
		width   : "100%",
		scroll:1,
		auto : false,
		prev : "#serv_prev",
		next : "#serv_next"
	});
	
	jQuery(".article-list").carouFredSel({
		width   : "100%",
		auto : false,
		scroll:1,
		prev : "#art_prev",
		next : "#art_next"
	});
	
*/
	
/* Tabs shortcode		 */
/*
	
	jQuery('.cu-tabs-nav').delegate('span:not(.cu-tabs-current)', 'click', function() {
		jQuery(this).addClass('cu-tabs-current').siblings().removeClass('cu-tabs-current')
		.parents('.cu-tabs').find('.cu-tabs-pane').hide().eq(jQuery(this).index()).show();
	});
	jQuery('.cu-tabs-pane').hide();
	jQuery('.cu-tabs-nav span:first-child').addClass('cu-tabs-current');
	jQuery('.cu-tabs-panes .cu-tabs-pane:first-child').show();	
	
*/
	
/* Toggle Shortcode */
/*

	jQuery(".mtoggle-content").hide(); 
	
	jQuery(".mtoggle").toggle(function(){
		jQuery(this).addClass("active");
		}, function () {
		jQuery(this).removeClass("active");
	});
	
	jQuery(".mtoggle").click(function(){
		jQuery(this).next(".mtoggle-content").slideToggle();
	});
		
*/
	
/* Accordion shortcode */
/*
	
  var allPanels = jQuery('#accordion > div').hide();
    
  jQuery('#accordion > h3 > a').click(function() {
    allPanels.slideUp();
    jQuery(this).parent().next().slideDown();
    return false;
  });
	
*/
	
/* Box close button	 */

/*
jQuery('.alert').append('<a class="close" href="#">?</a>');	

jQuery(".alert a").click(function(){
		jQuery(this).parent().fadeOut();
		return false;
	});	
		
*/
	
	
	
});