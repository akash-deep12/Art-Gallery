<?php include_once('header/header.php');
include_once('dbconnection/db.php');
include_once('class/artist.php');?>
<!DOCTYPE>
<html>
<head>
	<title>Art Gallery</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/jquery.countdown.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row list-group mt-3">
						<a href="" class="list-group-item list-group-item-action list-group-item-secondary active disabled" tabindex="-1" aria-disabled="true"  ><h4>Artist Products</h4></a>
		</div>
		<div class="row">
			<?php $art= new artist();
			$art->getProduct();?>
		</div>
	</div>

<?php include_once('footer/footer.php');?>
</body>
</html>