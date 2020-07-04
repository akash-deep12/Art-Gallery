<?php require_once("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Art Gallery</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
	<?php include_once("header/header.php"); ?>
	<script src="js/jquery.countdown.min.js"></script>
		<div class="container">
			<div class="row">
				<div class="left-container col-lg-3 mt-3">
					<div class="list-group">
						<a href="" class="list-group-item list-group-item-action list-group-item-secondary active disabled" tabindex="-1" aria-disabled="true" >Categories</a>
						<?php
						categories();
						logform();
						?>
					</div>
					<div class="container col-lg-9 mt-3">
						<?php
						if(isset($_GET['id']))
						{
							$id=$_GET['id'];
						}
						?>
						<div class="list-group-item list-group-item-action list-group-item-secondary active disabled title-bar">Category >
							<?php
							if(isset($_GET['id']))
							{
							$catq = mysqli_query($conn,"SELECT * FROM categories WHERE category_id = $id")or die(mysqli_error());
							$cata = mysqli_fetch_array($catq);
							echo $cata['category_name'];
							}
							?>
						</div>
						<?php if(empty($_GET['id'])){
							latest();
						}
							showprod();
						?>
					</div>
				</div>
			</div>
			<?php include_once("footer/footer.php");
			?>
		</body>
	</html>