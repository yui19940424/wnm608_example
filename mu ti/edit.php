<?php
include('./db.php');
$data = [];
$id = $_GET['id'];
$data = query_by_id($id);

echo $data;
// var_dump($data);

$info = [];
$info['id'] = $_POST['id'];
$info['name'] = $_POST['name'];
$info['price'] = $_POST['price'];
$info['des'] = $_POST['designer'];
$info['type'] = $_POST['type'];
$info['imgurl'] = $_POST['imgurl'];

// var_dump($info);
if ($info['name'] && $info['price'] && $info['des'] && $info['type'] && $info['imgurl']) {
	update_one($info);
	header('location: '.$_SERVER['HTTP_REFERER']);

}
echo '0';

if (is_numeric($_GET['delid'])) {
	delete_one($_GET['delid']);
	header("location:/admin.php");
}
echo '0';

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
						<li><a href="./admin.php">Product List</a></li>
						<li class="active"><a href="">Add New Product</a></li>
					</ul>
				</div>
			</div>
		</header>

		<div class="container" style="max-width: 1000px;">
			<div class="ehead" style="height: 3em;
    margin-bottom: 20px;">
					<li class="eli" style="width: 99%;
    height: 3em;
    border-radius: 0.5em;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    margin-left: 5px;">
						<a href="/admin.php" id="eback" style="display: block;
    float: left;
    margin-left: 1em;
    padding-top: 0.6em;
    font-weight: bold;
    text-decoration: none;
    color: black;">Back</a>
						<a href="/edit.php?delid=<?php  echo $data[0]['id'] ?>" id="edel" style="display: block;
    float: right;
    margin-right: 1em;
    padding-top: 0.6em;
    font-weight: bold;
    text-decoration: none;
    color: black;">Delete</a>
					</li>
			</div>

			<div class="grid ">
				<div class="col-7 eleft" style="height: 40em;
    margin-left: 0.3em;
    width: 90%;
    border-radius: 0.5em;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    margin-bottom: 20px;
    padding-top: 1em;
    padding-left: 1.5em;">
					<div>
						<h2><?php echo $data[0]['name'] ?></h2>
						
					</div>
					<div>
						<label for="" class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Name:</label>
						<span><?php echo $data[0]['name'] ?></span>
					</div><br>
					<div>
						<label for="" class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Price:</label>
						<span>$<?php echo $data[0]['price'] ?></span>
					</div><br>
					<div>
						<label for="" class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Designer:</label>
						<span><?php echo $data[0]['designer'] ?></span>
					</div><br>
					<div>
						<label for="" class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Type:</label>
						<span><?php echo $data[0]['type'] ?></span>
					</div><br>
					<div class="eimgdiv" style="height: 17em;
    width: auto;">
						<label for="" class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Thumbnail:</label>
						<span><img class="eimg" src="<?php echo $data[0]['imgurl'] ?>" alt="" style="height: 80%;
    width: auto;"></span>
					</div>
				</div>

				<div class="col-5 eright" style="height: 40em;
    width: 87%;
    border-radius: 0.5em;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    padding-top: 1em;
    padding-left: 1.5em;
    padding-right: 1.5em;">
					<div>
						<h2>Edit Product</h2>
						
						<form action="" method="POST">
							<div class="form-control">
								<input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
								<label for=""  class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Name</label>
								<input type="text" name="name" value="<?php echo $data[0]['name'] ?>" class="einput" placeholder="Enter the Product Name" style="display: block;
    height: 2.5em;
    width: 100%;
    border-bottom: 1px solid #e6e6e6;">
							</div><br>
							<div class="form-control">
								<label for=""  class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Price</label>
								<input type="text" name="price" value="<?php echo $data[0]['price'] ?>" class="einput" placeholder="Enter the Product Price" style="display: block;
    height: 2.5em;
    width: 100%;
    border-bottom: 1px solid #e6e6e6;">
							</div><br>
							<div class="form-control">
								<label for=""  class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Designer</label>
								<input type="text" name="designer" value="<?php echo $data[0]['designer'] ?>" class="einput" placeholder="Enter the Product Designer" style="display: block;
    height: 2.5em;
    width: 100%;
    border-bottom: 1px solid #e6e6e6;">
							</div><br>
							<div class="form-control">
								<label for=""  class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Type</label>
								<input type="text" name="type" value="<?php echo $data[0]['type'] ?>" class="einput" placeholder="Enter the Product Type" style="display: block;
    height: 2.5em;
    width: 100%;
    border-bottom: 1px solid #e6e6e6;">
							</div><br>
							<div class="form-control">
								<label for=""  class="elb" style="color: #999;
    display: block;
    font-size: 1em;">Thumbnail</label>
								<input type="text" name="imgurl" value="<?php echo $data[0]['imgurl'] ?>" class="einput" placeholder="Enter the Product Thumbnail" style="display: block;
    height: 2.5em;
    width: 100%;
    border-bottom: 1px solid #e6e6e6;">
							</div><br>
							<div class="form-control">
								<input class="ebtn" type="submit" value="Save Changes" style="width: 100%;
    height: 3em;
    background-color: #e6e6e6;">
							</div>

						</form>

					</div>



				</div>

			</div>




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
		<script>
			function getQueryStringRegExp(name) {
				var reg = new RegExp("(^|\\?|&)" + name + "=([^&]*)(\\s|&|$)", "i");
				if (reg.test(location.href)) return unescape(RegExp.$2.replace(/\+/g, " "));
				return "";
			};

			if (getQueryStringRegExp('type') == '') {
				var ids = document.getElementById("ALL");
				ids.className += ' screen_list_li_select';
			} else {
				var type = getQueryStringRegExp('type');
				var id = document.getElementById(type);
				id.className += ' screen_list_li_select';
			}
			 $("#mochu").change(function () {
			        var year = $("#mochu").val();
					console.log(year);
					if(year == 1){
						var asczd = "id"
						var asc = "desc"
					}else if(year == 2){
						var asczd = "id"
						var asc = "asc"
					}else if(year == 3){
						var asczd = "price"
						var asc = "desc"
					}else{
						var asczd = "price"
						var asc = "asc"
					}
					var test = window.location.href;
					if(getQueryStringRegExp('type') == ''){
						var url = test + '?asczd='+asczd+'&asc='+asc;
					}else{
						var url = test + '&asczd='+asczd+'&asc='+asc;
					}
					console.log(url);
					window.open(url,'_self')
			    });
			const items = document.querySelectorAll('.product_li .col-4');
			const items_name = document.querySelectorAll('.product_li .div_name');

			for (let i = 0; i < items.length; i++) {
				const ele = items[i];
				(() => {
					ele.addEventListener("click", ((i, ele) => {
						return () => {
							let urlss = './gallery.php?name=' + items_name[i].innerText;
							console.log(items_name[i].innerText);
							console.log(urlss);
							window.open(urlss,'_self');
						}
					})(i, ele), false);
				})();
			}

			const search_ele = document.querySelector('.container .card .form_control .search_icon');
			search_ele.addEventListener('click', () => {
				const input_val = document.querySelector('#search_input').value;
				if (input_val != "") {
					const url = './gallery.php?name=' + input_val;
					console.log(input_val);
					window.location.href = `${url}`;
				}
			}, false);

			const pop_up_btn = document.querySelector('footer .nav>.left>button');
			pop_up_btn.addEventListener("click", () => {
				input_email = document.querySelector('footer .nav>.left>input.email').value;
				if (input_email != '') {
					document.querySelector('footer .nav>.left>.pop_up').style['display'] = 'block';
				}
			}, false);

			const hide_pop_up = document.querySelector("footer .nav>.left>.pop_up>.pop_up_content button");
			hide_pop_up.addEventListener("click", () => {
				document.querySelector('footer .nav>.left>.pop_up').style['display'] = "none";
			}, false);
		</script>
	</body>

</html>
