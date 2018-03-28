<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
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
	<br><br><br><br>
	<div class="container">
		<h4>Search Results</h4><br>
		<?php
			$query = $_GET["keyphrase"];
			$dir = new DirectoryIterator("Videos/0001/Keywords_Splits/");
			$countx = 0;
			foreach ($dir as $fileinfo) 
			{
				if (!$fileinfo->isDot()) 
				{
					$countx++;
					$summary_text = file_get_contents("Videos/0001/Keywords_Splits/".$fileinfo->getFilename());
					$a = explode(",",$summary_text);
					foreach ($a as $keyphrase) 
					{
						if(strpos($keyphrase, $query) !== false)
						{
							$str_slide_id = (string)$fileinfo->getFilename()[9].(string)$fileinfo->getFilename()[10].(string)$fileinfo->getFilename()[11];
							$img = "Videos/0001/Image_Splits/FRAME-".$str_slide_id.".jpg";
							?>
							<div class="row">
								<div class="col-md-3">
									<a href="video.php?video_id=0001&slide_id=<?php echo $str_slide_id;?>"><img src="<?php echo $img?>" width="100%"></a>
								</div>
								<div class="col-md-6">
									<?php
									$title = "";
									foreach ($a as $keys) 
									{
										$title .= ucwords($keys);
										$title .= ", ";
									}
									echo substr($title, 0, strlen($title)-4);
									?>
								</div>
							</div>
							<br>
							<?php
							break;
						}
					}
				}
			}
			?>
	</div>
</body>
</html>