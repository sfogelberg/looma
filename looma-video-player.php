<!doctype html>
<!--
Name: Skip, Aaron, Connor, Ryan
Email: skip@stritter.com
Owner: VillageTech Solutions (villagetechsolutions.org)
Date: 2016 07
Revision: Looma Video Editor 1.0
File: video.php
Description: Can play an unedited video reroutes the user to looma-edited-video.php if
they want to edit a video
-->
<?php $page_title = 'Looma Video Player';
	  include ('includes/header.php');
      include ('includes/activity-button.php');

	  /*  thumbnail() is included with activity-button.php
	  function thumbnail ($fn) {
				//given a CONTENT filename, generate the corresponding THUMBNAIL filename
				//find the last '.' in the filename, insert '_thumb.jpg' after the dot
				//returns "" if no '.' found
				//example: input 'aaa.bbb.mp4' returns 'aaa.bbb_thumb.jpg' - this is the looma standard for naming THUMBNAILS
		 		$dot = strrpos($fn, ".");
				if ( ! ($dot === false)) { return substr_replace($fn, "_thumb.jpg", $dot, 10);}
				else return "";
      } //end function THUMBNAIL
    */
?>

	<link rel="stylesheet" type="text/css" href="css/looma-video.css">

	</head>

	<body>
		<?php
            //Gets the filename, filepath, and the thumbnail location
            $filename = $_REQUEST['fn'];
            $filepath = $_REQUEST['fp'];
            $displayname = $_REQUEST['dn'];
            $thumbFile = $filepath . thumbnail($filename);
	    ?>
			<script>
				//Converts thumbFile to js
                var fileName = "<?php echo $filename ?>";
                var filePath = "<?php echo $filepath ?>";
                var displayName = "<?php echo $displayname ?>"
				var thumbFile = <?php echo json_encode($thumbFile); ?>;
			</script>

			<div id="main-container-horizontal">
				<div id="video-player">
                    <div id="video-area">
						<video id="video">
							<!--Gets the source of the video and the thumbnail of the video-->
							<?php echo 'poster="' . $filepath . thumbnail($filename) . '">'; ?>
								<?php echo '<source id="video-source" src="' . $filepath . $filename . '" type="video/mp4">' ?>
						</video>
					</div>
				</div>
                <div id="title-area">
                    <h3 id="title"></h3>
                </div>

				<div id="media-controls">


					<button id="fullscreen-playpause"></button>

                    <div id="time" class="title">0:00</div>

					<button type="button" class="media" id="play-pause">
						<?php
                            keyword('Play/Pause');
                        ?>
					</button>
					<input type="range" class="video" id="seek-bar" value="0" style="display:inline-block">
					<br>

					<button type="button" class="media" id="volume">
						<?php keyword('Volume') ?>
					</button>
					<input type="range" class="video" id="volume-bar" min="0" max="1" step="0.1" value="0.5" style="display:inline-block">
					<br>

				</div>

			<div id="edit-controls">

					<button type="button" class="media hidden_button" id="edit">
                         <img src="images/edit-icon-below.png" alt="edit-icon">
                         <?php tooltip("Create Edited Video")?>
                    </button>

 <!--
                   <div id="login-div">
                        <button type="button" class="media" id="login" style="display:none;">
                            <?php keyword('Log In') ?>
                        </button>
                    </div>
-->

				</div>
			</div>

        <!--Adds the toolbar to the video player screen-->
        <?php include ('includes/js-includes.php'); ?>
        <script src="js/looma-video-player.js"></script>

	</body>