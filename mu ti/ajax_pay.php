<?php

if (isset($_GET["cart_name"])) {
    include('db.php');
	$sql = "delete from cart";
	$result = $mysqli->query($sql);
	echo json_encode($result);
} else {
}

?>