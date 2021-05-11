<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Free MP3 Tag Editor</title>
		<meta property="og:description"   content="This is a Free Web-base MP3 Tag Editor that can be used by anyone who want to edit an MP3 files without a third party software."/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.css" />
        <!-- EOF CSS INCLUDE -->

		<!-- JS ID3 TAGS -->
		<script src="/js/jquery/jquery.min.js"></script>
		<script src="/js/mp3tag.js/mp3tag.min.js"></script>
		<script src="/js/editor.js"></script>
		<!-- JS ID3 TAGS -->

    </head>
    <body>

<div class="row">
<div class="col-md-6" style="padding-bottom:50px;">

 <!-- START FORM VALIDATION STATES -->
                                <div class="panel panel-default">
								<div class="error-container">
								<div class="error-text">FREE ID3 TAG EDITOR</div>
								<p align="center"><small>FOR MP3 FILES</small></p>
								</div>

                                <div class="panel-body" style="padding-bottom:50px; padding-left:15%; padding-right:15%; padding-top:30px;">

									<div align="center">
									<div class="form-group">
                                            <label class="col-md-12 control-label"></label>
                                            <div class="col-md-12">
                                            <input type="file" class="fileinput btn-info" name="filename1" id="filename1" title="UPLOAD MP3 FILE"/>
                                            </div>
                                    </div>
									</div>

									<div class="col-md-12">
									<div><hr style="border-top:1px dashed #95B75D;"></div>
									 <img id="cover-preview" src="img/offline.jpg" style="width:106px; height:106px;" class="d-block box-shadow border mx-auto my-3">
									 <div style="margin-top:-96px; padding-left:140px; color:#cccccc;" align="justify"> <small>Once you upload your MP3 file, the editor should be able to read the current tags, including; Album Cover,
									 if you don't see the image, it is more than likely that your file doesn't have one, therefore, we recommend you to add one now, otherwise you can skip this step.</small></div>
									 </div>


									 <div class="form-group">
                                            <label class="col-md-12 control-label"></label>
                                            <div class="col-md-12">
                                            <input type="file" class="fileinput btn-default btn-xs" name="filename2" id="filename2" title="ADD ALBUM COVER"/>
                                            </div>
                                    </div>

                                    <div class="col-md-12" style="padding-bottom:30px; padding-top:20px;">
                                        <div class="form-group has-success">
                                            <label class="control-label">TITLE</label>
                                            <input id="title" type="text" class="form-control"/>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="control-label">ARTIST</label>
                                            <input id="artist" type="text" class="form-control"/>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="control-label">ALBUM</label>
                                            <input id="album" type="text" class="form-control"/>
                                        </div>
                                    </div>


								<div class="col-md-12">
										<div class="col-md-3">
										<div class="form-group has-success">
                                            <label class="control-label">YEAR</label>
                                            <input id="year" type="text" class="form-control"/>
                                        </div>
										</div>
										<div class="col-md-3">
										<div class="form-group has-success">
                                            <label class="control-label">TRACK</label>
                                            <input id="track" type="text" class="form-control"/>
                                        </div>
										</div>

										<div class="col-md-3">
										<div class="form-group has-success">
                                            <label class="control-label">GENRE</label>
                                            <input id="genre" type="text" class="form-control"/>
                                        </div>
										</div>

										<div class="col-md-9" style="padding-top:20px;">
										<div class="form-group has-success">
                                            <label class="control-label">COMPOSER</label>
                                            <input id="composer" type="text" class="form-control"/>
                                        </div>
										</div>
										<div class="col-md-9" style="padding-top:20px;">
										<div class="form-group has-success">
                                            <label class="control-label">COMMENT</label>
                                            <input id="comment" type="text" class="form-control"/>
                                        </div>
										</div>
								</div>
                                </div>

				<div class="error-actions" style="padding-top:50px; padding-bottom:50px;">
                <div class="row" style="padding-left:10%; padding-right:10%;">
                    <div class="col-md-12">
                        <button id="button-save" class="btn btn-info btn-block btn-lg">SAVE ID3 TAGS <i class="fas fa-check-circle"></i></button>
                    </div>

                </div>
				</div>

								</div>

                            <!-- END FORM VALIDATION STATES -->

</div>



    <div class="col-md-6">
        <div class="error-container">
            <div style="padding-top:30px; padding-bottom:0px; padding-left:3%; margin-left:-15px; height:300px; width:90%;">
			<span style="clear:left;">
			<div style="color:#ccc; margin-bottom:10px;">

			<span style="font-family:Arial; color:#333; padding-left:5px; padding-top:4px; padding-bottom:4px;"><strong>Artist Name:</strong><span id="artist_name"></span></span>
			</div>


			<div style="float:left;">
			<div style="padding-right:145px; display:" class="blobs-container"></div>
			<div id="imgDiv">
			<img id="preview-cover" src='img/logo-test.png' height="135" width="135" style="z-index:-1; filter:alpha(opacity=40); opacity: 0.4; border-radius:15px 50px;">
			</div>
			</div>

			<div style="padding-bottom:5px;">
			<span style="color:#5D6D7E;"><strong><i class="fas fa-signal-stream fa-lg" style="color:#F39C12;"></i></strong> <strong id="station_name" style="color:#F39C12;"> RADIO STATION </strong><i style="margin-left:10px; margin-bottom:10px; padding-left:10px; padding-right:10px; border-radius:3px; text-align: center; background-color:#C0392B; height:18px; color:#fff;
  display:inline-block; family-font:Arial;">LIVE</i></span>
			</div>
			<span style="color:#000000; family-font:Arial; padding-right:5px;"><strong>Title</strong>:</span>
			<span id="title_name" style="color:#999999; family-font:Arial;"></span>
			<span style="padding-right:10px; padding-left:10px; color:#aaaaaa;">| </span>
			<span style="color:#000000; padding-right:5px;"><strong>Album:</strong> </span>
			<span id="album_name" style="color:#999999; family-font:Arial;"></span>
			<span style="padding-right:10px; padding-left:10px; color:#aaaaaa;">- </span>
			<span id="year_name" style="color:#000000; padding-right:5px;"><strong>Year:</strong> </span>
			<span style="color:#999999; family-font:Arial;"></span>


			<p style="color:#808080; padding-top:5px; font-size:11px;">This is an example to show you how your data will be displayed in our radio online stream with the info that you entered.
			</p>

			<button class="btn btn-primary btn-sm active download-btn" disabled="disabled" type="button" onclick="notyConfirm();"><strong><i class="fas fa-dollar-sign"></i> BUY</strong></button>
			<input type="text" class="hide" value="0" id="stream_id">
			<input type="text" class="hide" value="0" id="music_id">

		    <span style="padding-left:10px;"><button class="btn btn-primary btn-xs disabled"><i class="fad fa-thumbs-up"></i></button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;">0</span>
			<span><button class="btn btn-primary btn-xs disabled"><i class="fad fa-thumbs-down"></i></button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;">0</span>
			<span><button class="btn btn-primary btn-xs disabled"><i class="fas fa-sign-language"></i> </button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;">0</span>
			<span><button class="btn btn-primary btn-xs disabled"><i class="fad fa-share-alt"></i> </button></span><span style="padding-right:5px; padding-left:5px; color:#AAAAAA;">0</span>
			</span>


			</div>

            <div class="error-text">Your Look in our Media Player</div>
            <div class="error-subtext">This design show you how the data that you just entered, populates our stream with ID3 Tags.
			These tags are supported by the most popular media players in the industry, Including; iTunes, Spodify to name a few.
			More over; the online radio industry also support ID3 Tags. Once you click on save you are good to download and test it in another player if you want.</div>
            <div class="error-actions">
                <div class="row">
                    <div class="col-md-12">
                        <a id="button-download" class="btn btn-primary btn-block btn-lg"><i class="far fa-download"></i> DOWNLOAD MY NEW FILE</a>
                    </div>
                </div>
            </div>

			<div class="error-subtext">
			<strong>Important Note:</strong>
			<br>This Free ID3 Tag Editor doesn't upload or store your file in our server. Everything is done through your browser.</div>


        </div>

</div>
</div>

    </body>
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
		<script type="text/javascript" src="js/all.js"></script>

		<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>

            <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
            <script type="text/javascript">
                function notyConfirm(){
                    noty({
                        text: 'Do you want to continue?',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $noty.close();
                                    noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
                                }
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                                    $noty.close();
                                    noty({text: 'You clicked "Cancel" button', layout: 'topRight', type: 'error'});
                                    }
                                }
                            ]
                    })
                }
            </script>
</html>
