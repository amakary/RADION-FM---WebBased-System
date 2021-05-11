$(document).ready(function() {
//alert();
		function getSongData(url) {
			$.ajax({
					url: "../php/votingSys.php",
					type: 'GET',
					dataType: 'json',
					success: function (data) {
                      //  alert(data);
						$('.songTitleSpan').html('' + data.songTitle);
						$('.fa-thumbs-down').removeClass('votedRed');
						$('.fa-angle-up').removeClass('votedGreen');
						$('.fa-facebook-square').removeClass('facebookShare');
						$('.fa-download').removeClass('downloadPlus');
						$('.fa-heart').removeClass('lovedRed');
						if (data.isVoted === '0') {
							$('.fa-thumbs-down').addClass('votedRed');
						} else if (data.isVoted === '1') {
							$('.fa-angle-up').addClass('votedGreen');
						}
						if (data.isLoved === 0) {
							$('.fa-heart').removeClass('lovedRed');
						}else if(data.isLoved === '1') {
							$('.fa-heart').addClass('lovedRed');
						}	
						if (data.isDedicate === 0) {
							$('.fa-facebook-square').removeClass('facebookShare');
						}else if (data.isDedicate === '1') {
							$('.fa-facebook-square').addClass('facebookShare');
						}
						var d = new Date(); 
						//$('#imgDiv img').attr('src', '');
						if (data.artwork === 1) {
							$('#imgDiv img').attr('src', 'aaaaaa');
							$('#imgDiv img').attr('src', url + d.getTime());
					//	alert(url);
						} else {
							$('#imgDiv img').attr('src', "https://radion.fm/img/icon-wallet.png");
						}
						
						$('#votingContainer').show();

					},
					error: function (xhr, ajaxOptions, thrownError) {
						if (xhr.status === 404) {
							// not broadcasting
							$('#votingContainer').hide();
						}

						if (xhr.status === 403) {
							console.log('forbidden');
						}
					}
				});

				setTimeout(function(){
					getSongData(url);
				}, 5000);
		}

		$.ajax({
				url: "../php/artworkUrl.php",
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					var url;
					if (data['stream_ind'] === '0') {
						url = data['audio_url'] + 'playingart?sid=1ver=';
					} else {
						var u = data['audio_url'].split('?')[0];
						url = u + 'playingart?sid=' + data['stream_num'] + 'ver=';
					}
					console.log(url);
					getSongData(url);
					addPlayDateTime();
				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						//alert('Not allowed.');
					}
				}
		});
		

		function sendAjax(vote) {
			$.ajax({
				url: "../php/votingSys.php",
				type: 'POST',
				data: {'vote': vote},
				success: function (data) {

				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						//alert('Not allowed.');
					}
				}
		});
		}
		
		$('.thumbs-icon').click(function() {
			var c = $(this);
			$.ajax({
				url: "../php/isLoggedIn.php",
				type: 'GET',
				success: function (data) {
						if (data === 'loggedIn') {
							if ($(c).hasClass('votedGreen') || $(c).hasClass('votedRed')) {
									sendAjax('removeVote');
									$(c).removeClass('votedGreen');
									$(c).removeClass('votedRed');
							} else {
								if ($(c).hasClass('fa-caret-up')) {sendAjax(1);
										$(c).addClass('votedGreen');
										$('.fa-caret-down').removeClass('votedRed');

								} else if ($(c).hasClass('fa-caret-down')) {sendAjax(0);
										$(c).toggleClass('votedRed');
										$('.fa-caret-up').removeClass('votedGreen');
								}
							}
							
						} else {
							alert('Sorry but only Radioners can vote. Register today or Log In if you are one us!');
						}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						console.log('sarma');
						//alert('Not allowed.');
					}
				}
			});
		});

		/* love vote js kanak */
		$('.love-it').click(function() {
			var c = $(this);
			$.ajax({
				url: "../php/isLoggedIn.php",
				type: 'GET',
				success: function (data) {
						if (data === 'loggedIn') {
							if ($(c).hasClass('lovedRed')) {
								sendAjax('removeLove');
								$(c).removeClass('lovedRed');
							}else{
								sendAjax('Love');
								$(c).addClass('lovedRed');
							}
						} else {
							alert('Sorry but only Radioners can vote. Register today or Log In if you are one us!');
						}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						console.log('sarma');
						//alert('Not allowed.');
					}
				}
			});
		});
		/* dedicate song vote js kanak */
		$('#shareForm').submit(function() {
			
			//var c = $('#shareForm');
			$.ajax({
				url: "../php/isLoggedIn.php",
				type: 'GET',
				success: function (data) {
					
						if (data === 'loggedIn') {
							if ($('.dedicate').hasClass('dedicatedRed')) {
								sendAjax('removeDedicate');
								$('.dedicate').removeClass('dedicatedRed');
							}else{
								sendAjax('Dedicate');
								$('.dedicate').addClass('dedicatedRed');
							} 
						} else {
							alert('Sorry but only Radioners can vote. Register today or Log In if you are one us!');
						}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 404) {
						//alert('Not allowed.');
					}

					if (xhr.status === 403) {
						console.log('sarma');
						//alert('Not allowed.');
					}
				}
			});
		});

		/* download song vote js kanak */
		$('.fa-download.thumbs-icon').click(function() {
			
			//alert('download');
			//var c = $('#shareForm');
			
			$.ajax({
				url: "../php/isLoggedIn.php",
				type: 'GET',
				success: function (data) {
					
						if (data === 'loggedIn') {
							sendAjax('download');
						} else {
							alert('Sorry but only Radioners can vote. Register today or Log In if you are one us!');
						}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					if (xhr.status === 404) {
						//alert('Not allowed.');
					}
					if (xhr.status === 403) {
						console.log('sarma');
						//alert('Not allowed.');
					}
				}
			});
			
		});

		//add paly timedate
		function addPlayDateTime(){
			$.ajax({
				url: "../php/votingSys.php",
				type: 'POST',
				data: {'count_latest_song': 'addPlayDateTime'},
				dataType: 'html',
				success: function (data) {
				},
				error: function (xhr, ajaxOptions, thrownError) {
				}
			});
			setTimeout(function(){
				addPlayDateTime();
			}, 2000);
		}
});