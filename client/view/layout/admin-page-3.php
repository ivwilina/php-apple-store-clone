<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/view/controller/admin-onload3.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="/PHP-apple-store-clone/client/view/style/admin-page-3.css">
    <link rel="shortcut icon" href="/PHP-apple-store-clone/client/asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="header-container">
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/view/layout/admin-page-header.php';
        if (!isset($_SESSION['Admin'])) {
            header("location:/PHP-apple-store-clone/client/view/layout/sign-in-page.php");
        }
        ?>
    </div>

    <!-- danh sách đơn hàng -->
    <section>
        <div class="section-wrapper">
            <div class="section-container">
                <div class="list-container">
                    <p class="list-title">Danh sách đơn hàng</p>
                    <div class="filter">
                        Bộ lọc
                        <input type="date" name="" id="filter" onchange="filter()">
                    </div>
                    <table class="bill-list" id="after-filter">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="15%">Tổng giá trị</th>
                            <th width="25%">Thông tin khách hàng</th>
                            <th width="50%">Thông tin đơn hàng</th>
                        </tr>
                        <?php
                        foreach ($data as $bill) {
                            $customerInfo = json_decode($bill['CustomerInfo']);
                            $billItem = json_decode($bill['BillItem']);
                        ?>
                            <tr>
                                <td>
                                    <?php echo $bill['BillId'] ?>
                                </td>
                                <td class="price">
                                    <?php echo $bill['TotalPrice'] ?>
                                </td>
                                <td>
                                    <?php echo $customerInfo[0] ?> , <?php echo $customerInfo[1] ?> , <?php echo $customerInfo[2] ?>
                                </td>
                                <td>
                                    <ul>
                                        <?php
                                        foreach ($billItem as $Item) {
                                        ?>
                                            <li>
                                                <?php echo $Item[4] ?> * <?php echo $Item[0] ?> /<?php echo $Item[1] ?> /<?php echo $Item[2] ?> /<?php echo $Item[3] ?>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="/PHP-apple-store-clone/client/script/admin-page-3.js"></script>
</body>

</html>