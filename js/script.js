$(document).ready(function(){
	//fungerar ej?

	$(".warning").delay(2000).fadeOut(2000);
	$(".success").delay(2000).fadeOut(2000);

	$("#addInfo").click(function(){
		window.location.href = "?changeinfo";
	});
    
    $window = $(window);
	$window.scroll(function() {
	    if ($window.scrollTop() >= 110) {
	        $('#mainmenu').css('position', 'fixed');
	        $('#mainmenu').css('left', '0');
	        $('#mainmenu').css('top', '20%');
	        $('#mainmenu').css('width', '8em');
	        $('#mainmenu').css('margin-top', '-2.5em');
	        $('#mainmenu').css('opacity', ($window.scrollTop()*5/1000).toString());
	    }else{
	    	$('#mainmenu').css('opacity', '1');
	    	$('#mainmenu').css('position', '');
	        $('#mainmenu').css('left', '0');
	        $('#mainmenu').css('width', '100%');
	        $('#mainmenu').css('margin-top', '30px');
	    }
	});
    

});
