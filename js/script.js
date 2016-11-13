$(document).ready(function(){
	//fungerar ej?

	$(".warning").delay(2000).fadeOut(2000);
	$(".success").delay(2000).fadeOut(2000);

    
    $window = $(window);
	$window.scroll(function() {
	    if ($window.scrollTop() >= 150) {
	        $('#mainmenu').css('position', 'fixed');
	        $('#mainmenu').css('left', '0');
	        $('#mainmenu').css('top', '20%');
	        $('#mainmenu').css('width', '8em');
	        $('#mainmenu').css('margin-top', '-2.5em');
	    }else{
	    	$('#mainmenu').css('position', 'relative');
	        $('#mainmenu').css('left', '0');
	        $('#mainmenu').css('width', '100%');
	        $('#mainmenu').css('top', '50px');
	    }
	});
    



});
