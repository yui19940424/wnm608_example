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

    <div class="container grid gap_cart cart_container">
        <div class="col-7 cart_cards">

            <?php foreach ($data as $val): ?>
            <div class="card_one">
                <div>
                    <div>
                        <input class="is_choose" type="checkbox" name="check_select">
                    </div>
                    <div>
                        <img src="<?php echo './assets/' . $val['small_pic'] . '.png' ?>" style="width: 100%;" alt="">
                    </div>
                    <div>
                        <p>
                            <?= $val['name']; ?>
                        </p>
                        <p>$ <?= $val['price']; ?>
                        </p>
                        <div>
                            <select class="select" name="" id="" data-select="<?= $val['num']; ?>">
                                <option value="<?= $val['num']; ?>" disabled selected>
                                    <?= $val['num']; ?>
                                </option>
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
                    </div>
                </div>
                <div style="width: 54px" class="del_this">
                    <img src="./assets/del.svg" style="width: 30px;" alt="">
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <div class="checkout col-5">
            <div class="up">
                <div class="up_item">
                    <p>Sub Total</p>
                    <p>￥0</p>
                </div>
                <div class="up_item">
                    <p>Taxes</p>
                    <p>￥0</p>
                </div>
                <div class="up_item">
                    <p>Total</p>
                    <p>￥0</p>
                </div>

            </div>

            <div class="down">
                <button>Checkout</button>
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        //去除地址栏参数
        let url = window.location.href;

        if (url.indexOf("?") != -1) {
            url = url.replace(/(\?|#)[^'"]*/, '');
            window.history.pushState({}, 0, url);

        }

        let sub_total = 0;
        let taxes = 0;
        let total = 0;


        const check_items = document.querySelectorAll(".cart_cards .is_choose");
        if (check_items.length > 0) {
            for (let i = 0; i < check_items.length; i++) {
                const ele = check_items[i];
                (() => {
                    ele.addEventListener("click", ((i, ele) => {
                        return () => {
                            const sub_total_ele = document.querySelector('.up .up_item:nth-of-type(1)>p:nth-of-type(2)');
                            const taxes_ele = document.querySelector('.up .up_item:nth-of-type(2)>p:nth-of-type(2)');
                            const total_ele = document.querySelector('.up .up_item:nth-of-type(3)>p:nth-of-type(2)');

                            let price = ele.parentNode.parentNode.children[2].children[1].innerText.replace('$ ', '');
                            let num = ele.parentNode.parentNode.children[2].children[2].children[0].value;
                            if (ele.checked == true) {
                                price = parseFloat(price);
                                console.log(price);
                                console.log(num);
                                sub_total += price * num;
                                taxes = sub_total * 0.1;
                                total = sub_total + taxes;
                                console.log(sub_total, taxes, total);
                                sub_total_ele.innerText = '￥' + sub_total.toFixed(2);
                                taxes_ele.innerText = '￥' + taxes.toFixed(2);
                                total_ele.innerText = '￥' + total.toFixed(2);

                                ele.parentNode.parentNode.parentNode.style['border'] = '1px solid #A49177';
                            } else {
                                price = parseFloat(price);
                                console.log(price);
                                console.log(num);
                                sub_total -= price * num;
                                taxes = sub_total * 0.1;
                                total = sub_total + taxes;
                                console.log(sub_total, taxes, total);
                                sub_total_ele.innerText = '￥' + sub_total.toFixed(2);
                                taxes_ele.innerText = '￥' + taxes.toFixed(2);
                                total_ele.innerText = '￥' + total.toFixed(2);

                                ele.parentNode.parentNode.parentNode.style['border'] = '1px solid #D9D9D9';
                            }
                        }
                    })(i, ele), false);
                })();
            }
        }

        const del_elements = document.querySelectorAll(".del_this");
        if (del_elements.length > 0) {
            for (let i = 0; i < del_elements.length; i++) {
                const ele = del_elements[i];
                (() => {
                    ele.addEventListener("click", ((i, ele) => {
                        return () => {
                            let name = ele.parentNode.children[0].children[2].children[0].innerText;
                            console.log(name);
                            const url = encodeURI('./ajax_del.php?cart_name=' + name);
                            axios.get(url)
                                .then(function (response) {
                                    // handle success
                                    console.log(response);
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                });

                            const card_one = ele.parentNode;
                            ele.parentNode.parentNode.removeChild(card_one);
                        }
                    })(i, ele), false);
                })();
            }
        }


        const check_out_ele = document.querySelector('.down button');
        check_out_ele.addEventListener("click", () => {
            const check_items_ = document.querySelectorAll(".cart_cards .is_choose");
            for (let i = 0; i < check_items_.length; i++) {
                let ele = check_items_[i];
                if (ele.checked == true) {
                    let name = ele.parentNode.parentNode.children[2].children[0].innerText
                    let num = ele.parentNode.parentNode.children[2].children[2].children[0].value;
                    const url = encodeURI('./ajax_check_out.php?cart_name=' + name + '&num=' + num);
                    axios.get(url)
                        .then(function (response) {
                            // handle success
                            console.log(response);
                            window.location.href = `./cart.php`;
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                }
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