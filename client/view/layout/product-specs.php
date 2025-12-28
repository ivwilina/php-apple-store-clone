<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

$product_request = $_GET['request'];
$sql_query = "SELECT * FROM product WHERE ItemName ='$product_request'";
$data = mysqli_query($connect, $sql_query);
$r = mysqli_fetch_assoc($data);
$obj = json_decode($r['Specs']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="/PHP-apple-store-clone/client/view/style/product-specs.css">
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

        ?>

    </div>

    <section class="section1">
        <div class="container-fluid">
            <div class="title-product-name item-id">
                <?php echo $r['ItemName'] ?>
            </div>
            <div class="product-display-specs">
                <div class="product-image-container">
                    <div class="product-image-slider">
                        <div class="slider-item root-item" id="first">
                            Apple Store
                        </div>
                        <?php
                        foreach ($obj->imagesource as $imgsrc) {
                        ?>
                            <div class="slider-item">
                                <img src="<?php echo $imgsrc->source ?>" alt="">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="next-button" onclick="imageSliderNext()">
                        <div class="icon">
                            <img src="/PHP-apple-store-clone/client/asset/icon/next.png" alt="">
                        </div>
                    </div>
                    <div class="prev-button" onclick="imageSliderPrev()">
                        <div class="icon">
                            <img src="/PHP-apple-store-clone/client/asset/icon/back.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="specs-wrap">
                    <div class="specs-title">Thông số kỹ thuật</div>
                    <div class="full-specs">
                        <ul>
                            <?php
                            foreach ($obj->information as $info) {
                            ?>
                                <li>
                                    <div class="specs-name">
                                        <?php echo $info->infoname ?>
                                    </div>
                                    <div class="specs-info">
                                        <?php echo $info->detail ?>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="specs-selection">
                <div class="color">
                    <div class="title">Chọn màu sắc sản phẩm.</div>
                    <ul class="color-list">
                        <?php
                        foreach ($obj->color as $color) {
                        ?>
                            <li class="color-selection" id="<?php echo $color->color ?>" onclick="selectColor(this.id)">
                                <div style="background-color: <?php echo $color->hex ?>">
                                    <?php echo $color->color ?>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="storage">
                    <div class="title">Cấu hình sản phẩm.</div>
                    <ul class="storage-list">
                        <?php
                        foreach ($obj->choice as $choice) {
                        ?>
                            <li>
                                <div class="storage-selection" id="<?php echo $choice->size . "^" . $choice->price ?>"
                                    onclick="selectStorage(this.id)">
                                    <div class="storage-size">
                                        <?php echo $choice->size ?>
                                    </div>
                                    <div class="storage-price">
                                        <?php echo $choice->price ?>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="add-to-bag-button-wrap">
                <?php
                if (isset($_SESSION['User'])) {
                ?>
                    <div class="add-to-bag-button"
                        onclick="addToCart('<?php echo $_SESSION['User'] ?>','<?php echo $product_request ?>')" id="t01">
                        Thêm vào giỏ hàng
                    </div>
                <?php
                } else {
                ?>
                    <div class="add-to-bag-button" onclick="location.href='sign-in-page.php'">
                        Đăng nhập để thêm vào giỏ hàng
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <script src="/PHP-apple-store-clone/client/script/product-specs.js"></script>
    <script>
        let x = document.querySelectorAll(".storage-price");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                .toLocaleString('en');
            x[i].innerHTML = num;
        }
    </script>

    <div class="footer-bar">

        <?php

        include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/view/layout/default-footer.php';

        ?>

    </div>



</body>

</html>