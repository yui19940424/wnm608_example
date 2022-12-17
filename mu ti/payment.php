<?php
include('db.php');
//未传值
if (!is_array($_GET) && count($_GET) <= 0) {
    $data = query_cart();
}
//未传参数
else if (!isset($_GET["name"]) && !isset($_GET['price']) && !isset($_GET['num']) && !isset($_GET['small_pic'])) {
    $data = query_cart();
}
//先插入后查询
else {

    $res = insert_cart($_GET['name'], $_GET['price'], $_GET['num'], $_GET['small_pic']);

    //echo $res;

    $data = query_cart();

    //echo(count($data));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./style.css">
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
                    <li><a href="./product_list.php">Gallery</a></li>
                    <li class="active"><a href="./cart.php">Cart</a></li>
                    <li><a href="./about.php">About</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container grid gap_cart cart_container" style="display: block;">
	<div style="width: 90%;height: 150px;flex: 1;border-radius: 20px;box-shadow: 1px 1px 20px 8px #0000001c;margin: 18px auto;">
		<div style="font-size: 25px;font-weight: 800;margin: 36px 15px 0;display: inline-block;width: 100%;">Thank you for your purchase</div>
		<a style="font-size: 19px;color: #a88564;margin: 23px 15px 0;display: block;" href="./home.php">Continue Shopping</a>
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        //去除地址栏参数
        let url = window.location.href;
    </script>
</body>

</html>