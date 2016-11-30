$(document).ready(function(){
	//fungerar ej?
	$('#searchbar').keyup(function(){
		var search = $(this).val();

		$.post('includes/searchresult.php', { search:search }, function(data){
			$('#backresult').html(data);
		});
	});

	$(".warning").delay(2000).fadeOut(2000);
	$(".success").delay(2000).fadeOut(2000);

	$("#addInfo").click(function(){
		window.location.href = "?changeinfo";
	});
    
	$("#addProfilePicture").click(function(){
		window.location.href = "?changeprofilepicture";
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
	        $('#searchbar').hide();
	    }else{
	    	$('#mainmenu').css('opacity', '1');
	    	$('#mainmenu').css('position', '');
	        $('#mainmenu').css('left', '0');
	        $('#mainmenu').css('width', '100%');
	        $('#mainmenu').css('margin-top', '30px');
	        $('#searchbar').show();
	    }
	});
    
});
