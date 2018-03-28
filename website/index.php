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
		<h4>Summarized Videos (1)</h4><br>
		<div class="row">
			<div class="col-md-3">
				<a href="summary.php?video_id=0001&slide_id=1&front=1"><img src="Videos/0001/Image_Splits/FRAME-010.jpg" width="100%"></a>
			</div>
			<div class="col-md-8">
				<h5>Different Types of Learning</h5>
				56 slides<br><br>
				Supervised Learning, Training Examples, Machine Learning, Label Data, Unsupervised Learning, Performance Metric.
			</div>
		</div>
	</div>
</body>
</html>