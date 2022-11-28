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

    <div class="container">
        <div class="card">
            <div class="form_control">
                <form>
                    <input id='search_input' type="text" class="hotdog" placeholder="Search">
                </form>
                <i class="search_icon"></i>
            </div>
            <div class="product_li">
                <div class="product_card" style="margin-bottom: 24px;">
                    <div class="grid gap1">
                        <div class="col-4">
                            <figure class="figure product-overlay">
                                <img src="./assets/g1.png" alt="">
                                <figcaption>
                                    <div class="caption-body">

                                        <div class="div_name">
                                            <?php
                                            echo $data[0]['name'];
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            echo '$ ' . $data[0]['price'];
                                            ?>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-4">
                            <figure class="figure product-overlay">
                                <img src="./assets/g2.png" alt="">
                                <figcaption>
                                    <div class="caption-body">

                                        <div class="div_name">
                                            <?php
                                            echo $data[1]['name'];
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            echo '$ ' . $data[1]['price'];
                                            ?>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-4">
                            <figure class="figure product-overlay">
                                <img src="./assets/g3.png" alt="">
                                <figcaption>
                                    <div class="caption-body">

                                        <div class="div_name">
                                            <?php
                                            echo $data[2]['name'];
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            echo '$ ' . $data[2]['price'];
                                            ?>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>

                </div>
                <div class="product_card">
                    <div class="grid gap1">
                        <div class="col-4">
                            <figure class="figure product-overlay">
                                <img src="./assets/g4.png" alt="">
                                <figcaption>
                                    <div class="caption-body">

                                        <div class="div_name">
                                            <?php
                                            echo $data[3]['name'];
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            echo '$ ' . $data[3]['price'];
                                            ?>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-4">
                            <figure class="figure product-overlay">
                                <img src="./assets/g5.png" alt="">
                                <figcaption>
                                    <div class="caption-body">
                                        <div class="div_name">
                                            <?php
                                            echo $data[4]['name'];
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            echo '$ ' . $data[4]['price'];
                                            ?>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-4">
                            <figure class="figure product-overlay">
                                <img src="./assets/g6.png" alt="">
                                <figcaption>
                                    <div class="caption-body">

                                        <div class="div_name">
                                            <?php
                                            echo $data[5]['name'];
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            echo '$ ' . $data[5]['price'];
                                            ?>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
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
        const items = document.querySelectorAll('.product_li .col-4');
        const items_name = document.querySelectorAll('.product_li .div_name');

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