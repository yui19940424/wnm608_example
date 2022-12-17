<?php
include('./db.php');

$data = query_all();
echo $data;

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
					<p>MUTI HOME</p>
				</div>
				<div class="nav_items">
					<ul>
						<li><a href="./home.php">Home</a></li>
						<li class="active"><a href="./product_list.php">Gallery</a></li>
						<li><a href="./cart.php">Cart</a></li>
						<li><a href="./about.php">About</a></li>
					</ul>
				</div>
			</div>
		</header>

		<div class="container">
			<div class="card">
				<div class="form_control">
					<form>
						<input id='search_input' type="text" class="hotdog" placeholder="Search">
					</form>
					<i class="search_icon"></i>
				</div>
				<div class="screen_list">
					<div class="screen_list_left">
						<ul class="screen_list_ul">
							<li id="ALL" class="screen_list_li"><a class="screen_list_li_a"
									href="/product_list.php">ALL</a></li>
							<li id="Table" class="screen_list_li"><a class="screen_list_li_a"
									href="/product_list.php?type=Table">Table</a></li>
							<li id="Chair" class="screen_list_li"><a class="screen_list_li_a"
									href="/product_list.php?type=Chair">Chair</a></li>
							<li id="Stool" class="screen_list_li"><a class="screen_list_li_a"
									href="/product_list.php?type=Stool">Stool</a></li>
							<li id="Sofa" class="screen_list_li"><a class="screen_list_li_a"
									href="/product_list.php?type=Sofa">Sofa</a></li>
						</ul>
					</div>
					<div class="screen_list_right">
						<select class="screen_list_select" name="mochu" id="mochu">
							<option class="screen_list_option" style="height:300px" value="1">Newest</option>
							<option class="screen_list_option" value="2">Oldest</option>
							<option class="screen_list_option" value="3">Last expensive</option>
							<option class="screen_list_option" value="4">Most expensive</option>
						</select>
					</div>
				</div>
				<div class="product_li">
					<div class="product_card" style="margin-bottom: 24px;">
						<div class="grid gap1">
							<?php foreach ($data as $key => $value){ ?>
							<div class="col-4">
								<figure class="figure product-overlay">
									<img src="<?php echo $value['imgurl'];?>" alt="">
									<figcaption>
										<div class="caption-body">

											<div class="div_name">
												<?php
                                            echo $value['name'];
                                            ?>
											</div>
											<div>
												<?php
                                            echo '$ ' . $value['price'];
                                            ?>
											</div>
										</div>
									</figcaption>
								</figure>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
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
