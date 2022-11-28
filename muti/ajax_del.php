<?php

if (isset($_GET["cart_name"])) {
    include('db.php');
    $data = query_cart_one($_GET['cart_name']);

    if ($data) {
        if (count($data) >0) {
            delete_cart($_GET['cart_name']);
            $arr = array('cart_name' => 'del ok');
            echo json_encode($arr);
        } else {
            $arr = array('cart_name' => 'no item__');
            echo json_encode($arr);
        }
    } else {
        $arr = array('cart_name' => 'no item');
        echo json_encode($arr);
    }

} else {
    $arr = array('cart_name' => 'false');
    echo json_encode($arr);
}

?>