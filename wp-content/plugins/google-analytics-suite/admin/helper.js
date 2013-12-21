(function ($) {
	// Here "$" is a jQuery reference
$(document).ready(function() {
	$("#ttf").click(
		function(){
			$("#ttf").css({"background" : "#F09609"});
			$("#ttf").html("busy");
			$.get(ajaxurl, {action:"guess_adsense_id"}, function(response) {
				if (response==""){
					$("#ttf").css({"background" : "red"});
					$('#ttf').unbind('click');
					$("#ttf").html("<a target='_blank' href='http://arevico.com/how-to-get-your-adsense-id/' style='color:white;'>Not found! Tutorial</a>");
				} else {
					$("#ttf").css({"background" : "#8CBF26"});
					$("#ttf").html("found!");
					$("[name='gasuite-opt2719[aid]']").val(response);
				}
			});
		});

});
})(jQuery)
