<?php
// =============================
// Chức năng: Hiển thị giỏ hàng của người dùng
// Kiểm tra đăng nhập, lấy dữ liệu giỏ hàng từ database và hiển thị
// =============================

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="/PHP-apple-store-clone/client/view/style/user-cart.css">
    <link rel="shortcut icon" href="/PHP-apple-store-clone/client/asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="navigation-bar">

        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/view/layout/default-header.php';

        if (!isset($_SESSION['User'])) {
            header("location:/PHP-apple-store-clone/client/view/layout/sign-in-page.php");
        }
        ?>

    </div>

    <section>
        <div class="cart-wrapper">
            <div class="cart-container">
                <div class="cart-header">
                    Giỏ hàng của bạn
                </div>
                <div class="cart-content">
                    <div class="product-container">

                        <?php
                        $user = $_SESSION['User'];

                        $query_user = "SELECT * FROM user WHERE Username='$user'";
                        $data_user = mysqli_query($connect, $query_user);
                        $userdata = mysqli_fetch_assoc($data_user);

                        $query_cart = "SELECT * FROM bag WHERE Username='$user'";
                        $data_cart = mysqli_query($connect, $query_cart);
                        $cartitem = [];
                        while ($fetched_data_item = mysqli_fetch_assoc($data_cart)) {
                            $cartitem[] = $fetched_data_item;
                        }
                        ;

                        foreach ($cartitem as $item) {
                            $item_json = json_decode($item['BagItem']);
                            ?>
                            <div class="item">
                                <div class="image-container">
                                    <img src="<?php echo $item_json[4] ?>" alt="">
                                </div>
                                <div class="info-container">
                                    <p class="p-id"><?php echo $item['BagId'] ?></p>
                                    <p class="p-name"><?php echo $item_json[0] ?></p>
                                    <p class="p-choice"><?php echo $item_json[2] ?></p>
                                    <p class="p-color"><?php echo $item_json[1] ?></p>
                                    <p class="p-price"><?php echo $item_json[3] ?></p>
                                </div>
                                <div class="option-choice">
                                    <div class="item-quantity">
                                        Số lượng
                                        <input type="number" name="quantity" id="" class="quantity" min="1" value="1"
                                            onchange="calPrice()">
                                    </div>
                                    <img src="/PHP-apple-store-clone/client/asset/icon/remove.png" alt=""
                                        onclick="removeCart('<?php echo $item['BagId'] ?>')">
                                </div>
                            </div>
                            <?php
                        }

                        ?>


                    </div>
                    <div class="checkout-container">
                        <div class="checkout-header">
                            Checkout
                        </div>
                        <div class="customer-info">
                            <p>Tên khách hàng</p>
                            <input type="text" name="fullname" id="userName" required=""
                                value="<?php echo $userdata['Name'] ?>">
                            <p>Số điện thoại</p>
                            <input type="tel" name="phonenumber" id="userTel" placeholder="0123456789"
                                pattern="[0-9]{4}[0-9]{3}[0-9]{3}" required=""
                                value="<?php echo $userdata['PhoneNumber'] ?>">
                            <p>Địa chỉ</p>
                            <input type="text" name="address" id="userAddress" required=""
                                value="<?php echo $userdata['Address'] ?>">
                        </div>
                        <div class="price">
                            <span>Tổng giá trị:</span>
                            <span id="total-price"></span>
                        </div>
                        <div class="checkout-button" onclick="checkout()">
                            Đặt hàng
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="/PHP-apple-store-clone/client/script/user-cart.js"></script>

</body>

</html>