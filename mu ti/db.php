<?php
    $db_host = 'localhost';
    $db_name = 'demo';
    $db_user = 'demo';
    $db_pwd = 'Gmjc5K64Em2PwM2L';
function query_all()
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        return false;
    }
	$mysqli->set_charset("utf8"); 
    //设置编码
	$type = $_GET['type'];
	$asc = $_GET['asc'];
	$asczd = $_GET['asczd'];
	if(isset($type)){
		if(isset($asczd)){
			//$sql ="SELECT * FROM product WHERE `type`='".$type."'";
			$sql ="SELECT * FROM product WHERE `type`='" .$type. "' ORDER BY `" .$asczd."`".$asc."";
		}else{
			//$sql ="SELECT * FROM product WHERE `type`='" .$type. "' ORDER BY `" .$asczd."`".$asc."";
			$sql ="SELECT * FROM product WHERE `type`='".$type."'";
		}
		$result = $mysqli->query($sql);
		if ($result === false) { //执行失败
		    echo $mysqli->error;
		    echo $mysqli->errno;
		}
	}else{
		if(isset($asczd)&&isset($asc)){
			$sql ="SELECT * FROM product  ORDER BY `" .$asczd."`".$asc."";
		}else{
			$sql ="SELECT * FROM product";
		}
		//$sql = "select * from product";
		$result = $mysqli->query($sql);
		if ($result === false) { //执行失败
		    echo $mysqli->error;
		    echo $mysqli->errno;
		}
	}
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();
    return $data;
}

function query_one($name)
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }
    //设置编码
    $mysqli->set_charset("utf8"); //或者 $mysqli->query("set names 'utf8'")
    $sql = "select * from product where name='$name'";
    $result = $mysqli->query($sql);
    if ($result === false) { //执行失败
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    //行数
    //echo $result->num_rows;
    //列数 字段数
    //echo $result->field_count;
    //获取字段信息
    //$field_info_arr = $result->fetch_fields();
    //移动记录指针
    //$result->data_seek(1);//0 为重置指针到起始
    //获取数据
    //while ($row = $result->fetch_assoc()) {
    //echo $row['name'];
    //}
    //也可一次性获取所有数据
    //$result->data_seek(0);//如果前面有移动指针则需重置
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();

    return $data;
}

function query_by_id($id)
{
    global $db_host;
    global $db_name;
    global $db_user;
    global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }
    //设置编码
    $mysqli->set_charset("utf8"); //或者 $mysqli->query("set names 'utf8'")
    $sql = "select * from product where id='$id'";
    $result = $mysqli->query($sql);
    if ($result === false) { //执行失败
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    //行数
    //echo $result->num_rows;
    //列数 字段数
    //echo $result->field_count;
    //获取字段信息
    //$field_info_arr = $result->fetch_fields();
    //移动记录指针
    //$result->data_seek(1);//0 为重置指针到起始
    //获取数据
    //while ($row = $result->fetch_assoc()) {
    //echo $row['name'];
    //}
    //也可一次性获取所有数据
    //$result->data_seek(0);//如果前面有移动指针则需重置
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();

    return $data;
}


function query_by_designer($designer)
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }
    //设置编码
    $mysqli->set_charset("utf8"); //或者 $mysqli->query("set names 'utf8'")
    $sql = "select * from product where designer='$designer'";
    $result = $mysqli->query($sql);
    if ($result === false) { //执行失败
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    //行数
    //echo $result->num_rows;
    //列数 字段数
    //echo $result->field_count;
    //获取字段信息
    //$field_info_arr = $result->fetch_fields();
    //移动记录指针
    //$result->data_seek(1);//0 为重置指针到起始
    //获取数据
    //while ($row = $result->fetch_assoc()) {
    //echo $row['name'];
    //}
    //也可一次性获取所有数据
    //$result->data_seek(0);//如果前面有移动指针则需重置
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();

    return $data;
}

//cart操作

function query_cart()
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }


    $sql1 = "select * from cart";
    $result1 = $mysqli->query($sql1);
    if ($result1 === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    $data1 = $result1->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();
    return $data1;
}

function query_cart_one($cart_name)
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }
    $sql1 = "select * from cart where name='$cart_name'";
    $result1 = $mysqli->query($sql1);
    if ($result1 === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    $data1 = $result1->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();
    return $data1;
}

function update_cart_one($name, $num)
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }

    $sql = "UPDATE cart SET num = '$num' WHERE name = '$name'";
    $result = $mysqli->query($sql);
    if ($result === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }

    $mysqli->close();
    return true;
}

function update_one(array $info)
{
    global $db_host;
    global $db_name;
    global $db_user;
    global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }

    $sql = "UPDATE product SET name='{$info['name']}',price='{$info['price']}',designer='{$info['des']}',type='{$info['type']}',imgurl='{$info['imgurl']}' WHERE id='{$info['id']}'";

    // var_dump($sql);exit;
    $result = $mysqli->query($sql);
    if ($result === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }

    $mysqli->close();
    return true;
}




function insert_cart($name, $price, $num, $small_pic)
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }


    $sql1 = "select * from cart where name='$name'";
    $result1 = $mysqli->query($sql1);
    if ($result1 === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    $data1 = $result1->fetch_all(MYSQLI_ASSOC);
    $row_len = count($data1);
    //该商品不存在，插入
    if ($row_len == 0) {
        $sql = "INSERT INTO `cart` (`id`, `name`,  `price`, `num`,`small_pic`) VALUES (NULL, '$name',  '$price', '$num','$small_pic')";
        $result = $mysqli->query($sql);
        if ($result === false) {
            //echo $mysqli->error;
            //echo $mysqli->errno;
            $mysqli->close();
            return false;
        }
    }
    //该商品存在，则更新数量
    else {
        $num = $data1[0]['num'] + $num;
        $sql = "UPDATE cart SET num = '$num' WHERE name = '$name'";
        $result = $mysqli->query($sql);
        if ($result === false) {
            //echo $mysqli->error;
            //echo $mysqli->errno;
            $mysqli->close();
            return false;
        }
    }
    //影响条数
    //echo $mysqli->num_rows;
    //插入的id
    //echo $mysqli->insert_id;
    $mysqli->close();
    return true;
}


function delete_cart($name)
{
	global $db_host;
	global $db_name;
	global $db_user;
	global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }

    $sql = $sql = "delete from cart where name='$name'";
    $result = $mysqli->query($sql);
    if ($result === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    //影响条数
    //echo $mysqli->num_rows;
    //插入的id
    //echo $mysqli->insert_id;
    $mysqli->close();
    return true;
}


function delete_one($id)
{
    global $db_host;
    global $db_name;
    global $db_user;
    global $db_pwd;
    //面向对象方式
    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
    //面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if (mysqli_connect_error()) {
        //echo mysqli_connect_error();
        return false;
    }

    $sql = $sql = "delete from product where id='$id'";
    $result = $mysqli->query($sql);
    if ($result === false) {
        //echo $mysqli->error;
        //echo $mysqli->errno;
        $mysqli->close();
        return false;
    }
    //影响条数
    //echo $mysqli->num_rows;
    //插入的id
    //echo $mysqli->insert_id;
    $mysqli->close();
    return true;
}

?>