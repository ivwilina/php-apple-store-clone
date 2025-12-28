<?php
// =============================
// Chức năng: Hiển thị dữ liệu tài khoản cho admin khi tải trang
// Lấy danh sách loại tài khoản và tất cả tài khoản
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';
//select type
$query_select_account_type = "SELECT * FROM usertype";
$get_account_type = mysqli_query($connect, $query_select_account_type);
$get_account_type02 = mysqli_query($connect, $query_select_account_type);


//select all account
$query_get_all_account = "SELECT * FROM user";
$get_all_account = mysqli_query($connect, $query_get_all_account);
