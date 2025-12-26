<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="../style/user-info.css">
    <link rel="shortcut icon" href="../../asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="navigation-bar">
        <?php
        include_once 'default-header.php';
        if (!isset($_SESSION['User'])) {
            header("location:./sign-in-page.php?");
        }


        require_once './client/connection/sql-connection.php';
        $usr = $_SESSION['User'];
        $query_user = "SELECT * FROM user WHERE Username = '$usr'";
        $usrdata = mysqli_query($connect, $query_user);
        $usrdataf = mysqli_fetch_assoc($usrdata);
        ?>

        <section>
            <div class="section-wrapper">
                <div class="section-container">
                    <form action="../controller/user-update.php" method="post">
                        <div class="title">Thông tin cá nhân</div>
                        <ul>
                            <li>
                                <div class="in-content">
                                    Tên đăng nhập
                                </div>
                                <div class="in-input">
                                    <input title="none" type="text" name="username" id="" required="" value="<?php echo $usrdataf['Username'] ?>">
                                </div>
                            </li>
                            <li>
                                <div class="in-content">
                                    Mật khẩu
                                </div>
                                <div class="in-input">
                                    <input title="none" type="text" name="pass" required="" value="<?php echo $usrdataf['Password'] ?>">
                                </div>
                            </li>
                            <li>
                                <div class="in-content">
                                    Tên người dùng
                                </div>
                                <div class="in-input">
                                    <input title="none" type="text" name="name" required="" value="<?php echo $usrdataf['Name'] ?>">
                                </div>
                            </li>
                            <li>
                                <div class="in-content">
                                    Số điện thoại
                                </div>
                                <div class="in-input">
                                    <input title="none" type="tel" name="phonenumber" value="<?php echo $usrdataf['PhoneNumber'] ?>" placeholder="0123456789" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" required="">
                                </div>
                            </li>
                            <li>
                                <div class="in-content">
                                    Email
                                </div>
                                <div class="in-input">
                                    <input title="none" type="email" name="emailaddress" placeholder="Email" required="" value="<?php echo $usrdataf['EmailAddress'] ?>">
                                </div>
                            </li>
                            <li>
                                <div class="in-content">
                                    Địa chỉ
                                </div>
                                <div class="in-input">
                                    <input title="none" type="text" name="add-address" value="<?php echo $usrdataf['Address'] ?>">
                                </div>
                            </li>
                        </ul>
                        <button type="submit" name="update">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>

</body>

</html>