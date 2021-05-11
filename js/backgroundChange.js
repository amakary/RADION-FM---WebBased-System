$(document).ready(function() {
	var checkBackground = function() {

		$.ajax({
	            url: "php/script.php",
	            type: 'GET',
	            dataType: 'json',
	            success: function (data) {

				  	$('#mainTitle').html(data.title);
			  		$('#mainSubtitle').html(data.subtitle);
			  		$('#mainTitle').show();
			  		$('#mainSubtitle').show();
			  		$('.backg').css("background-image", "url('" + data.url + "')");

				  	setTimeout(function(){
				  		checkBackground();
				  	 }, 30000);

	            }
	        });

	}
	checkBackground();
});