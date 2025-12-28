<?php
// =============================
// Chức năng: Đăng xuất tài khoản
// Khi người dùng yêu cầu logout, session sẽ bị hủy và chuyển về trang chủ
// =============================

session_start(); // Bắt đầu session để quản lý đăng nhập
if (isset($_GET['logout'])) {
    session_destroy(); // Hủy toàn bộ session (đăng xuất)
    header("location:/PHP-apple-store-clone/client/view/layout/main-page.php"); // Chuyển về trang chủ
}
