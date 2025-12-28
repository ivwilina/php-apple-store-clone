<?php
// =============================
// Chức năng: Xử lý đăng nhập và đăng ký tài khoản
// Nếu đăng nhập thành công sẽ chuyển hướng tới trang phù hợp
// Nếu đăng ký sẽ thêm tài khoản mới vào database
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

if (isset($_POST['signin'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from user where Username='$username'and Password='$password'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_assoc($result);
    if ($data) {
        if ($data['Type'] == "user") {
            $_SESSION['User'] = $data['Username'];
            header("location:/PHP-apple-store-clone/client/view/layout/main-page.php");
        }
        if ($data['Type'] == "admin") {
            $_SESSION['Admin'] = $data['Name'];
            header("location:/PHP-apple-store-clone/client/view/layout/admin-page-1.php");
        }
    } else {
        header("location:/PHP-apple-store-clone/client/view/layout/sign-in-page.php?Invalid=wrongpass");
    }
}
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $tel = $_POST['phonenumber'];
    $mail = $_POST['emailaddress'];
    $address = $_POST['address'];
    $type = "user";
    $query_signup = "INSERT INTO user VALUES ('$username','$password','$type','$name','$tel','$mail','$address')";
    mysqli_query($connect, $query_signup);
    header("location:/PHP-apple-store-clone/client/view/layout/sign-in-page.php");
} else {
    echo "not working";
}
