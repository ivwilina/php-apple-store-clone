<?php
// =============================
// Chức năng: Hiển thị dữ liệu sản phẩm cho admin khi tải trang
// Lấy danh sách loại sản phẩm và tất cả sản phẩm
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';
//select type
$query_select_product_type = "SELECT * FROM type";
$get_product_type = mysqli_query($connect, $query_select_product_type);
$get_product_type02 = mysqli_query($connect, $query_select_product_type);


//select all product
$query_get_all_product = "SELECT * FROM product";
$get_all_product = mysqli_query($connect, $query_get_all_product);
