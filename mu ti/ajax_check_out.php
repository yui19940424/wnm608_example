<?php

if (isset($_GET["cart_name"]) && isset($_GET['num'])) {
    include('db.php');
    $data = query_cart_one($_GET['cart_name']);
    //echo gettype($data[0]['num']);
    //echo gettype($_GET['num']);
    //echo $data[0]['num'];
    //echo $_GET['num'];
    if ($data) {
        $num = (int) $data[0]['num']-(int) $_GET['num'];
        echo $num;
        if ($num > 0) {
            update_cart_one($_GET["cart_name"], $num);
            $arr = array('cart_name' => 'update ok');
            echo json_encode($arr);
        } else {
            delete_cart($_GET['cart_name']);
            $arr = array('cart_name' => 'del ok');
            echo json_encode($arr);
        }
    } else {
        $arr = array('cart_name' => 'err');
        echo json_encode($arr);
    }
} else {
    $arr = array('cart_name' => 'false');
    echo json_encode($arr);
}

?>