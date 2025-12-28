<?php
// =============================
// Chức năng: Cập nhật thông tin tài khoản người dùng
// Nhận dữ liệu từ form POST, thực hiện truy vấn cập nhật vào bảng user
// Sau khi cập nhật sẽ chuyển về trang đăng nhập
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';
session_start(); // Bắt đầu session để lấy thông tin người dùng
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $name = $_POST['name'];
    $tel = $_POST['phonenumber'];
    $email = $_POST['emailaddress'];
    $address = $_POST['add-address'];

    $query_update = "UPDATE user SET `Username`='$username',`Password`='$password',`Name`='$name',`PhoneNumber`='$tel',`EmailAddress`='$email',`Address`='$address' WHERE Username='$username'";

    mysqli_query($connect, $query_update);

    session_destroy(); // Hủy session sau khi cập nhật
    header("location:/PHP-apple-store-clone/client/view/layout/sign-in-page.php"); // Chuyển về trang đăng nhập
}
