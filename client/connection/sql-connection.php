<?php
// =============================
// Chức năng: Kết nối tới cơ sở dữ liệu MySQL
// Sử dụng thông tin cấu hình từ serverConfig.php
// =============================

require_once(__DIR__ . '/../config/serverConfig.php');

// Tạo kết nối tới database
$connect = mysqli_connect($hostname, $username, $password, $database);

// Kiểm tra kết nối, nếu lỗi thì dừng chương trình và báo lỗi
if ($connect->connect_error) {
    die("Connection Failed" . $connect->connect_error);
}
