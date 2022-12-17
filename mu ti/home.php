<?php
include('./db.php');

$data = query_all();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                    <li class="active"><a href="./home.php">Home</a></li>
                    <li><a href="./product_list.php">Gallery</a></li>
                    <li><a href="./cart.php">Cart</a></li>
                    <li><a href="">About</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="head_img">
        <div class="head_img_div">
            <div class="form_control_home">
                <form>
                    <input id='search_input' type="text" class="hotdog" placeholder="Search">
                </form>
                <i class="search_icon"></i>
            </div>
        </div>
    </div>

    <div class="bestseller">
        <div class="row">
            <div class="item">
                <img src="./assets/g1.png" style="width: 100%;" alt="">
                <p class="p_name">
                    <?php echo $data[0]['name'] ?>
                </p>
                <p>$
                    <?php echo $data[0]['price'] ?>
                </p>
            </div>
            <div class="item">
                <img src="./assets/g2.png" style="width: 100%;" alt="">
                <p class="p_name">
                    <?php echo $data[1]['name'] ?>
                </p>
                <p>$
                    <?php echo $data[1]['price'] ?>
                </p>
            </div>
            <div class="item">
                <img src="./assets/g3.png" style="width: 100%;" alt="">
                <p class="p_name">
                    <?php echo $data[2]['name'] ?>
                </p>
                <p>$
                    <?php echo $data[2]['price'] ?>
                </p>
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
        const items = document.querySelectorAll('.bestseller .row .item');
        const items_name = document.querySelectorAll('.bestseller .row .p_name');

        for (let i = 0; i < items.length; i++) {
            const ele = items[i];
            (() => {
                ele.addEventListener("click", ((i, ele) => {
                    return () => {
                        const url = './gallery.php?name=' + items_name[i].innerText;
                        console.log(items_name[i].innerText);
                        window.location.href = `${url}`;
                    }
                })(i, ele), false);
            })();
        }

        const search_ele = document.querySelector('.form_control_home .search_icon');
        search_ele.addEventListener('click', () => {
            const input_val = document.querySelector('#search_input').value;
            if (input_val != '') {
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