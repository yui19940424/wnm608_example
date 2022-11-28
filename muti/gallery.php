<?php

//未传值
if (!is_array($_GET) && count($_GET) <= 0) {
    $url = './noresult.php';
    header("Location: $url");
    exit();
}

//未传name
if (!isset($_GET["name"])) {
    $url = './noresult.php';
    header("Location: $url");
    exit();
}

include('./db.php');
$data = query_one($_GET['name']);

//数据库连接出错
if (!$data) {
    $url = './noresult.php';
    header("Location: $url");
    exit();
}

$row_len = count($data);
if ($row_len == 0) {

    $url = './noresult.php';
    header("Location: $url");
    exit();

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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
                    <li class="active"><a href="./product_list.php">Gallery</a></li>
                    <li><a href="./cart.php">Cart</a></li>
                    <li><a href="./about.php">About</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="second_nav">
        <p><a href="./product_list.php">Gallery</a> > Product</p>
    </div>
    <div class="container grid gap container_gallery">
        <div class="col-6">
            <img src="<?php echo './assets/' . $data[0]['small_pic'] . '.png' ?>" style="width: 100%;" alt="">

        </div>

        <div class=" add_cart col-6">
            <div class="product_info">
                <p>
                    <?php
                    echo $data[0]['name'];
                    ?>
                </p>
                <p>
                    <?php
                    echo 'Designer: ' . $data[0]['designer'];
                    ?>
                </p>
                <p>
                    <?php
                    echo '$ ' . $data[0]['price'];
                    ?>
                </p>
            </div>
            <div class="select_div">
                <select name="" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <div class="btn">
                <button>Add to Cart</button>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="title">Details</div>
        <div class="line"></div>
        <div class="gray_box">
            <img src="<?php echo './assets/' . $data[0]['big_pic'] . '.png' ?>" alt="" style='width:100%'>
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

        const add_ele = document.querySelector(".add_cart .btn button");
        add_ele.addEventListener("click", () => {
            const name = document.querySelector('.product_info p:nth-of-type(1)').innerText;
            let price = document.querySelector('.product_info p:nth-of-type(3)').innerText;
            price=price.replace('$ ', '');
            const num = document.querySelector('.select_div select').value;
            let small_pic = document.querySelector('.container_gallery div:nth-of-type(1) img').src;
            small_pic=small_pic.replace('http://localhost/muti/assets/', '');
            small_pic=small_pic.replace('.png','');
            console.log(name,price,num,small_pic);

            const params = new URLSearchParams();
            params.append(name,price,num,small_pic);
            const url = encodeURI('./cart.php?name=' + name+'&price='+price+'&num='+num+'&small_pic='+small_pic);
            console.log(url);
            window.location.href = `${url}`;

        })


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