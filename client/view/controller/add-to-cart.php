<?php
// =============================
// Chức năng: Thêm sản phẩm vào giỏ hàng
// Nhận thông tin sản phẩm từ biến GET, lấy ảnh màu phù hợp và lưu vào bảng bag
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

//nhận data sản phẩm được chọn
$ori_string = $_GET['add'];
// $ori_string = "2023/10/6-16:56:37^guest01^ip14^pink^256GB^799";


//tách chuỗi data nhận được
$item_info = explode("^", $ori_string);

$cart_id = $item_info[0];
$user = $item_info[1];
$item_name = $item_info[2];
$item_color = $item_info[3];
$item_storage = $item_info[4];
$item_price = $item_info[5];
$item_colorimg = "";

//lấy link ảnh
$sql_query = "SELECT * FROM product WHERE ItemName ='$item_name'";
$data = mysqli_query($connect, $sql_query);
$r = mysqli_fetch_assoc($data);
$obj = json_decode($r['Specs']);
foreach ($obj->imagesource as $imgsrc) {
    if ($imgsrc->color == $item_color) {
        $item_colorimg = $imgsrc->source;
    }
}


//encode thành json
$specs = array($item_name, $item_color, $item_storage, $item_price, $item_colorimg);
$specs_json = json_encode($specs, JSON_UNESCAPED_UNICODE);

//add vô bảng
$add_query = "insert into bag values('$cart_id','$user','$specs_json')";
mysqli_query($connect, $add_query);
