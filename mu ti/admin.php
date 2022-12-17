<?php
include('./db.php');

$data = query_all();
echo $data;
// var_dump();
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gallery</title>
		<link rel="stylesheet" href="./style.css">
		<script src="https://libs.baidu.com/jquery/1.9.0/jquery.js" type="text/javascript"></script>
	</head>

	<body>

		<header>
			<div class="nav">
				<div class="logo_text">
					<p>Product Admin</p>
				</div>
				<div class="nav_items">
					<ul>
						<li class="active"><a href="./admin.php">Product List</a></li>
						<li><a href="">Add New Product</a></li>
					</ul>
				</div>
			</div>
		</header>

		<div class="container" style="max-width: 1000px;">
			<h3>Product List</h3>
			<ul class="listul" style="width: 100%;padding-left: 0px;">

			<?php foreach ($data as $key => $value){ ?>

				<div class="uldiv" style="margin-bottom: 20px;">
					<li class="pli" style="width: 99%;height: 9em;border-radius: 0.5em;box-shadow: 0 0 10px rgb(0 0 0 / 10%);margin-left: 5px;">
						<div class="first1" style="width: 15%;
    float: left;">
							<img src="<?php echo $value['imgurl'];?>" alt="" class="pimg" style="width: auto;
    height: 80%;
    margin-top: 15px;
    margin-left: 15px;">
						</div>
						<div class="secend2" style="width: 70%;
    height: 80%;
    display: block;
    float: left;
    margin-top: 15px;
    margin-left: 0.5em;">
							<?php echo $value['name'];?>
						</div>
						<div class="three3" style="width: 10%;
    height: 80%;
    display: block;
    float: left;
    padding-left: 0.5em;
    padding-top: 15px;
    margin-top: 15px;">
							<a href="/edit.php?id=<?php echo $value['id'];?>" class="editbtn" style="font-weight: bold;
    text-decoration: none;
    background-color: #eee;
    border-radius: 0.2em;
    padding: 0.5em 1em;
    cursor: pointer;
    text-align: center;
    margin-left: 2.5em;
    color: black;">Edit</a>
						</div>
					
					</li>
				</div>

			<?php } ?>




			</ul>
		</div>
		<footer>
			<div class="nav">
				<div class="left">
					<p>Contact us</p>
					<input class="email" type="text" placeholder="your@address.com">
					<button>Submit</button>
					<div class="pop_up">
						<div class="pop_up_content">
							<p>Hi！</p>
							<p>We have sent an email to your mailbox, please check it</p>
							<button>Confirm</button>
						</div>
					</div>
				</div>
				<div class="right">
					<div>
						<p class="first">Company</p>
						<p>Our story</p>
						<p>Our studio</p>
						<p>Our designer</p>
					</div>
					<div>
						<p class="first">Shipping with us</p>
						<p>Delivery</p>
						<p>Product warranty</p>
						<p>Sales and refunds</p>
						<p>FAQ</p>
					</div>
					<div>
						<p class="first">Social</p>
						<p>Instagram</p>
						<p>Facebook</p>
						<p>Pinterest</p>
					</div>
				</div>
			</div>
		</footer>

	</body>

</html>
