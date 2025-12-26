<?php
require_once './client/connection/sql-connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="../style/item-list.css">
    <link rel="shortcut icon" href="../../asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="navigation-bar">

        <?php

        include_once 'default-header.php'

        ?>

    </div>

    <section class="section1">
        <div class="container-fluid">
            <div class="content-view">
                <?php
                $searchItem = $_GET['searchItem'];
                if ($searchItem == "all") {
                    //get all product
                    $query_product_selector = "SELECT * FROM product";
                    $raw_product_data = mysqli_query($connect, $query_product_selector);
                    while ($fetched_product_data = mysqli_fetch_assoc($raw_product_data)) {
                        $row_product[] = $fetched_product_data;
                    };

                    //get all product type
                    $query_type_selector = "SELECT * FROM type";
                    $raw_type_data = mysqli_query($connect, $query_type_selector);
                    while ($fetched_type_data = mysqli_fetch_assoc($raw_type_data)) {
                        $row_type[] = $fetched_type_data;
                    };

                    foreach ($row_type as $type) {
                ?>

                        <div class="product-title">
                            <?php echo $type['ItemType'] ?>
                        </div>

                        <div class="product-container">
                            <?php
                            foreach ($row_product as $product) {
                                if ($product['ItemType'] == $type['ItemType']) {
                                    $product_json = json_decode($product['Specs']);
                            ?>
                                    <a href="./product-specs.php?request=<?php echo $product['ItemName'] ?>" class="item">
                                        <div class="item-inner">
                                            <img src="<?php echo $product_json->imagesource[0]->source ?>" alt="">
                                            <div class="p-name">
                                                <?php echo $product['ItemName'] ?> | Chính hãng Apple
                                            </div>
                                            <div class="p-price">
                                                <?php echo $product_json->choice[0]->price ?>
                                            </div>
                                        </div>
                                    </a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                } else {
                    //get all product
                    $row_product = [];
                    $query_product_selector = "SELECT * FROM product WHERE ItemName like '%$searchItem%'";
                    $raw_product_data = mysqli_query($connect, $query_product_selector);
                    while ($fetched_product_data = mysqli_fetch_assoc($raw_product_data)) {
                        $row_product[] = $fetched_product_data;
                    };

                    if ($row_product == null) {
                    ?>
                        <div class="product-title">
                            Không có sản phẩm tương ứng
                        </div>
                    <?php
                    } else {
                    ?>

                        <div class="product-title">
                            Có
                            <?php echo count($row_product) ?> sản phẩm tương ứng
                        </div>

                        <div class="product-container">
                            <?php
                            foreach ($row_product as $product) {
                                $product_json = json_decode($product['Specs']);
                            ?>
                                <a href="./product-specs.php?request=<?php echo $product['ItemName'] ?>" class="item">
                                    <div class="item-inner">
                                        <img src="<?php echo $product_json->imagesource[0]->source ?>" alt="">
                                        <div class="p-name">
                                            <?php echo $product['ItemName'] ?> | Chính hãng Apple
                                        </div>
                                        <div class="p-price">
                                            <?php echo $product_json->choice[0]->price ?>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>


    <div class="footer-bar">
        <?php
        include_once 'default-footer.php'
        ?>
    </div>

    <script>
        let x = document.querySelectorAll(".p-price");
        for (let i = 0, len = x.length; i < len; i++) {
            let num = Number(x[i].innerHTML)
                .toLocaleString('en');
            x[i].innerHTML = num;
        }
    </script>
</body>

</html>