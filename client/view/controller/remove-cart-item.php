<?php
// =============================
// Chức năng: Xóa sản phẩm khỏi giỏ hàng
// Nhận id sản phẩm từ biến GET và thực hiện truy vấn xóa
// Sau đó chuyển về trang giỏ hàng
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

$removeItemId = $_GET['id'];

$query = "DELETE FROM bag WHERE BagId='$removeItemId'";

mysqli_query($connect, $query);

header('location:/PHP-apple-store-clone/client/view/layout/user-cart.php');
