$(document).ready(function(){
	
	$('#searchbar').keyup(function(){
		
		$('#backresult').show();
		var search = $(this).val();
		$.ajax({
			type: 'GET',
			url: 'includes/searchresults.php',
			data: 'search='+search,
			success:function(data){
				$('#backresult').html(data);
			}
		});
		
	});

	$('#searchreceiver').keyup(function(){
		$('#searchreceiver_result').show();
		var search = $(this).val();
		$.ajax({
			type: 'GET',
			url: 'includes/searchreceiver_results.php',
			data: 'search='+search,
			success:function(data){
				$('#searchreceiver_result').html(data);
			}
		});
	});	

	$(".warning").delay(2000).fadeOut(2000);
	$(".success").delay(2000).fadeOut(2000);
	$("#backresult").hide();
	$('#searchreceiver_result').hide();
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
    $('body').click(function(){
    	$('#backresult').delay(200).fadeOut(200);
    	$('#searchreceiver_result').delay(200).fadeOut(200);
    	$('#searchbar').val("");
    	$('#backresult').delay(200).fadeOut(200);
    });
    
    $('#newmessage_btn').click(function(){
    	$('#newmessage').show();
    	$('#exit_newmessage_btn').show();
    	$('#newmessage_btn').hide();
    });
    $('#exit_newmessage_btn').click(function(){
		$('#newmessage').hide();
	    $('#exit_newmessage_btn').hide();
	    $('#newmessage_btn').show();
	    var old_url = window.location.href;
	    var new_url = old_url.substring(0, old_url.indexOf('?'));
	    window.location.replace(new_url);    	
    });
    if(getUrlParameter('receiver')){
		$('#searchreceiver').attr("placeholder", "Välj en annan användare");
    }else{
    	$('#newmessage').hide();
	    $('#exit_newmessage_btn').hide();
	    $('#newmessage_btn').show();
	    $('#searchreceiver').attr("placeholder", "Välj en användare");
    }
    
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
