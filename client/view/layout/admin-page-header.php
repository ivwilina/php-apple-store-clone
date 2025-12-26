<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="../style/admin-page-header.css">
    <link rel="shortcut icon" href="../../asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="admin-info">
                <div class="greeting">
                    <p>Xin chào</p>
                    <p class="name"><?php echo $_SESSION['Admin'] ?></p>
                </div>
                <a href="../controller/logout-process.php" class="logout-button">
                    <img src="../../asset/icon/logout-icon.png" alt="">
                    Đăng xuất
                </a>
            </div>
            <div class="subpage">
                <a href="./admin-page-1.php" class="direct-subpage">
                    Sản phẩm
                </a>
                <a href="./admin-page-3.php" class="direct-subpage">
                    Đơn hàng
                </a>
                <a href="./admin-page-2.php" class="direct-subpage">
                    Tài khoản
                </a>
            </div>
        </div>
    </div>
</body>

</html>