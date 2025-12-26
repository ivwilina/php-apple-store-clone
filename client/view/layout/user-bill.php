
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="../style/user-bill.css">
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
        $usrdata = mysqli_query($connect,$query_user);
        $usrdataf = mysqli_fetch_assoc($usrdata);
        $name = $usrdataf['Name'];
        
        $query_selectAllBill = "SELECT * FROM bill";
        $queryData = mysqli_query($connect,$query_selectAllBill);
        $data = [];
        while($fetchedData = mysqli_fetch_assoc($queryData))
        {
            $data[] = $fetchedData;
        };
    ?>

    </div>

    <!-- danh sách đơn hàng -->
    <section>
        <div class="section-wrapper">
            <div class="section-container">
                <div class="list-container">
                    <p class="list-title">Lịch sử mua hàng</p>
                    <div class="filter">
                        Bộ lọc
                        <input type="date" name="" id="filter" onchange="filter('<?php echo $name?>')">
                    </div>
                    <table class="bill-list" id="after-filter">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="15%">Tổng giá trị</th>
                            <th width="25%">Thông tin khách hàng</th>
                            <th width="50%">Thông tin đơn hàng</th>
                        </tr>
                        <?php
                        
                            foreach($data as $bill)
                            {
                                $customerInfo = json_decode($bill['CustomerInfo']);
                                $billItem = json_decode($bill['BillItem']);
                                if($customerInfo[0]==$name)
                                {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $bill['BillId']?>
                                        </td>
                                        <td class="price">
                                            <?php echo $bill['TotalPrice']?>
                                        </td>
                                        <td>
                                            <?php echo $customerInfo[0]?> , <?php echo $customerInfo[1]?> , <?php echo $customerInfo[2]?>
                                        </td>
                                        <td>
                                            <ul>
                                                <?php 
                                                foreach($billItem as $Item)
                                                    {
                                                        ?>
                                                            <li>
                                                                <?php echo $Item[4]?> * <?php echo $Item[0]?> /<?php echo $Item[1]?> /<?php echo $Item[2]?> /<?php echo $Item[3]?>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php
                                }    
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="../../script/user-bill.js"></script>
</body>

</html>