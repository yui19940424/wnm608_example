<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Product List</title>

	<?php include"parts/meta.php";?>
</head>
<body>

	<?php include"parts/navbar.php";?>

	<div class="contianer">
		<div class="card soft">
			<h2>Product list</h2>

			<!--ul>li*4>a[href="product_items.php"]>{product $}-->
			<ul>
				<li><a href="product_item.php?id=1">product 1</a></li>
				<li><a href="product_item.php?id=2">product 2</a></li>
				<li><a href="product_item.php?id=3">product 3</a></li>
				<li><a href="product_item.php?id=4">product 4</a></li>
			</ul>
		</div>
	</div>

</body>
</html>


