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

			if($video_id == "0001")
			{
				$summary = "Supervised Learning, Training Examples, Machine Learning, Label Data, Unsupervised Learning, Performance Metric.";
			}

			$video = "Videos/".$video_id."/Video.mp4";
			$img = "Videos/0001/Image_Splits/FRAME-010.jpg";
			

			{?>
				<div class="row">
					<div class="col-md-9">
						<?php
						echo "<video controls autoplay width='85%'> <source src=".$video." type='video/mp4'> </video><br><br><br>";
						echo $summary;
						?>
					</div>
					<div class="col-md-2">
						<div class="row">
						<?php
						echo "<center><a href=summary.php?video_id=".$video_id."&slide_id=1&front=1><img src=".$img." width='100%'><br><br>";
						echo "<u>View Slides</u></center></a>";
						echo "<br><br>";
						?>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	</div>
</body>
</html>