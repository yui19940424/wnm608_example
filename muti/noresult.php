<?php
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
                    <li><a href="./about.php">About</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="head_img_no">
        <div class="head_img_div">
            <div class="form_control_home">
                <form>
                    <input id='search_input' type="text" class="hotdog" placeholder="Search">
                </form>
                <i class="search_icon"></i>
            </div>
            <div class="info">It's not available yet</div>
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
        const search_ele = document.querySelector('.head_img_no .form_control_home .search_icon');
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