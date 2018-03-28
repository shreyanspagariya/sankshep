<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<a class="navbar-brand" href="index.php">Sankshep</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form class="form-inline my-2 my-lg-0" action="gotosearch.php" method="POST">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<br><br><br>
	<div class="container">
		<?php

			$video_id = $_GET["video_id"];
			$slide_id = (int)$_GET["slide_id"];
			$is_front = (int)$_GET["front"];

			if($video_id == "0001")
			{
				$slide_count = 56;
				$lecture_img = "Videos/0001/Image_Splits/FRAME-010.jpg";
			}

			if($slide_id >= 10)
			{
				$str_slide_id = "0".$slide_id;
			}
			else
			{
				$str_slide_id = "00".$slide_id;
			}

			$img = "Videos/".$video_id."/Image_Splits/FRAME-".$str_slide_id.".jpg";
			$summary = "Videos/".$video_id."/Summary_Splits/BIGRAMS-".$str_slide_id.".txt";
			$summary_text = file_get_contents($summary);

			if(strpos($summary_text, "<li>") === false)
			{?>
				<div class="row">
					<div class="col-md-7">
						<?php
						echo "<center><img src=".$img." width='100%'></center><br><br>";
						echo "<a href=summary.php?video_id=".$video_id."&slide_id=".($slide_id-1)."&front=-1><u>Prev Slide</u></a>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<a href=summary.php?video_id=".$video_id."&slide_id=".($slide_id+1)."&front=1><u>Next Slide</u></a>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<center>".$slide_id." of ".$slide_count."</center>";
						?>
					</div>
					<div class="col-md-3">
						<?php
						echo "Important Points:<br><br>";
						echo "(None)";
						echo "<br>";
						?>
					</div>
					<div class="col-md-2">
						<?php
						echo "<center><a href=video.php?video_id=".$video_id."&slide_id=".$slide_id."><img src=".$img." width='100%'><br><br>";
						echo "<u>View Video Clip</u></center></a>";
						echo "<br><br>";
						echo "<center><a href=fullvideo.php?video_id=".$video_id."><img src=".$lecture_img." width='100%'><br><br>";
						echo "<u>View Full Lecture</u></center></a>";
						echo "<br>";
						?>
					</div>
				</div>
				<?php
			}
			else
			{?>
				<div class="row">
					<div class="col-md-7">
						<?php
						echo "<center><img src=".$img." width='100%'></center><br><br>";
						echo "<a href=summary.php?video_id=".$video_id."&slide_id=".($slide_id-1)."&front=-1><u>Prev Slide</u></a>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<a href=summary.php?video_id=".$video_id."&slide_id=".($slide_id+1)."&front=1><u>Next Slide</u></a>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<center>".$slide_id." of ".$slide_count."</center>";
						?>
					</div>
					<div class="col-md-3">
						<?php
						echo "Important Points:<br><br>";
						echo $summary_text;
						echo "<br>";
						?>
					</div>
					<div class="col-md-2">
						<?php
						echo "<center><a href=video.php?video_id=".$video_id."&slide_id=".$slide_id."><img src=".$img." width='100%'><br><br>";
						echo "<u>View Video Clip</u></center></a>";
						echo "<br><br>";
						echo "<center><a href=fullvideo.php?video_id=".$video_id."><img src=".$lecture_img." width='100%'><br><br>";
						echo "<u>View Full Lecture</u></center></a>";
						echo "<br>";
						?>
					</div>
				</div>
				<?php
			}
		?>
	</div>
</body>
</html>