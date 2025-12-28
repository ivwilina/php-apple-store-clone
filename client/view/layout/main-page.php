
<?php
// Kiểm tra đăng nhập (nếu cần, thêm logic ở đây)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--
        Đây là phần đầu trang, khai báo các meta, tiêu đề, liên kết CSS và font.
        - Sử dụng Poppins cho font chữ.
        - Liên kết tới file CSS chính của trang.
        - Đặt favicon của Apple Store.
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="/PHP-apple-store-clone/client/view/style/main-page.css">
    <link rel="shortcut icon" href="/PHP-apple-store-clone/client/asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>

    <!--
        Phần header: import thanh điều hướng từ file default-header.php
        Sử dụng include_once để tránh import nhiều lần.
    -->
    <div class="navigation-bar">
        <?php
        include_once 'default-header.php';
        ?>
    </div>

    <section id="section-banner0">
        <!--
            Banner quảng cáo sản phẩm mới (iPhone 15 Pro)
            Hiển thị hình ảnh và thông tin sản phẩm sắp ra mắt.
        -->
        <div class="container-fluid">
            <div class="banner0">
                <span id="product-ads">iPhone 15 Pro</span>
                <img src="/PHP-apple-store-clone/client/asset/products/product-comingsoon/ip15-banner.jpg"
                    alt="iphone15-titanium-banner">
                <span id="description">Sắp ra mắt</span>
            </div>
        </div>
    </section>

    <section id="section-banner1">
        <!--
            Banner quảng cáo iPad Air với video nền.
            Có nút "Tìm hiểu thêm" dẫn tới trang thông số sản phẩm.
        -->
        <div class="container-fluid">
            <div class="banner1">
                <div class="content">
                    <video autoplay muted loop>
                        <source src="/PHP-apple-store-clone/client/asset/products/ipads/ipad-air-video.mp4" type="video/mp4">
                    </video>
                    <div class="typo">
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                        <div>iPad Air</div>
                    </div>
                </div>
                <div class="link">
                    <span>Feel the Air</span>
                    <a href="/PHP-apple-store-clone/client/view/layout/product-specs.php?request=iPad Air">
                        Tìm hiểu thêm >
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="section-banner2">
        <!--
            Banner quảng cáo các dòng iPhone 14.
            Hiển thị danh sách sản phẩm với hình ảnh, tên, mô tả ngắn và giá.
            Mỗi sản phẩm là một thẻ <li> có link tới trang chi tiết.
        -->
        <div class="container-fluid">
            <div class="banner2">
                <div class="banner2-header">
                    <span id="product-name">
                        iPhone 14
                    </span>
                    <span id="product-slogan">
                        Tuyệt tác.
                    </span>
                </div>
                <ul class="banner2-list">
                    <li>
                        <a href="/PHP-apple-store-clone/client/view/layout/product-specs.php?request=iPhone 14 Pro Max">
                            <img src="/PHP-apple-store-clone/client/asset/products/ip14s/ip14-prm.png" alt="iPhone-14-pro-max">
                            <span class="product-name">
                                Pro Max
                            </span>
                            <span class="product-shortdesc">
                                Pro. Beyond.
                            </span>
                            <span class="product-price">
                                26390000
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/PHP-apple-store-clone/client/view/layout/product-specs.php?request=iPhone 14 Pro">
                            <img src="/PHP-apple-store-clone/client/asset/products/ip14s/ip14-pr.png" alt="iPhone-14-pro">
                            <span class="product-name">
                                Pro
                            </span>
                            <span class="product-shortdesc">
                                The Pro
                            </span>
                            <span class="product-price">
                                24990000
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/PHP-apple-store-clone/client/view/layout/product-specs.php?request=iPhone 14 Plus">
                            <img src="/PHP-apple-store-clone/client/asset/products/ip14s/ip14-p.png" alt="iPhone-14-plus">
                            <span class="product-name">
                                Plus
                            </span>
                            <span class="product-shortdesc">
                                Plus. Better.
                            </span>
                            <span class="product-price">
                                21490000
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/PHP-apple-store-clone/client/view/layout/product-specs.php?request=iPhone 14">
                            <img src="/PHP-apple-store-clone/client/asset/products/ip14s/ip14.png" alt="iPhone-14">
                            <span class="product-name">
                                14
                            </span>
                            <span class="product-shortdesc">
                                Original One
                            </span>
                            <span class="product-price">
                                18790000
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="section-banner3">
        <!--
            Banner quảng cáo Macbook và Apple Watch.
            Hiển thị nhiều sản phẩm với hình ảnh, tên và giá.
        -->
        <div class="container-fluid">
            <div class="banner3">
                <a class="product-banner3" id="no1" href="/PHP-apple-store-clone/client/view/layout/product-specs.php?request=Macbook Air M2">
                    <span class="name-id">
                        Macbook Air M2
                    </span>
                    <span class="price">
                        26890000
                    </span>
                    <img src="/PHP-apple-store-clone/client/asset/products/macbooks/macbook-air-m1.png" alt="macbook-pro-15">
                </a>
                <div class="product-banner3" id="no2">
                    <span class="name-id">
                        Apple Watch Utra
                    </span>
                    <span class="price">
                        From $799
                    </span>
                    <img src="/PHP-apple-store-clone/client/asset/products/watchs/watch-ultra.jpg" alt="watch-ultra">
                </div>
                <div class="product-banner3" id="no3">
                    <div class="typo-2">
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                        <div>Macbook Air</div>
                    </div>
                </div>
                <div class="product-banner3" id="no4">
                    <span class="name-id">
                        Apple Watch Ultra 2
                    </span>
                    <span class="price-unknow">
                        Sắp ra mắt
                    </span>
                    <img src="/PHP-apple-store-clone/client/asset/products/watchs/watch-ultra2.jpg" alt="watch-ultra-2">
                </div>
            </div>
        </div>
    </section>


    <!-- Footer import -->
    <div class="footer-bar">

        <!--
            Phần footer: import từ file default-footer.php
        -->
        <?php
        include_once 'default-footer.php';
        ?>

    </div>


    <script src="/PHP-apple-store-clone/client/script/main-page.js"></script>
    <script>
        // Định dạng lại giá sản phẩm thành dạng có dấu phẩy (VD: 21,490,000)
        let x = document.querySelectorAll(".product-price, .price");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                .toLocaleString('en');
            x[i].innerHTML = num;
        }
    </script>
</body>

</html>