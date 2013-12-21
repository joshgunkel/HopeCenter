/*
 *
 */
(function ($) {
	// Here "$" is a jQuery reference
$(document).ready(function() {
/* reset some styles*/

$("input,textarea").css({"border-radius":"0", "-moz-box-sizing":"content-box","box-sizing": "content-box"})
$(".msubmit").css({"border":"0","color": "#ffffff","background":"#1BA1E2"});
 

 $(".sltabhead").click(function(e){
 	tab_do($(".sltabhead").index(e.target));
 });

});

function tab_do(ind){
	$(".sltabhead").addClass("slactive");
	
	$(".sltabhead").each(function (i,e){
		if (i!=ind){
			$(e).removeClass("slactive");
		}	
	});

	$(".sltab").each(function (i,e){
		if (i!=ind){
			$(e).css({"display" : "none"});
		}	else {
			$(e).css({"display" : "block"});
		}
	});
 }

})(jQuery)