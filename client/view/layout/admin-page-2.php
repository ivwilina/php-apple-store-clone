<?php
require_once './client/view/controller/admin-onload2.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="../style/admin-page-2.css">
    <link rel="shortcut icon" href="../../asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="header-container">
        <?php
        include_once './client/view/layout/admin-page-header.php';
        if (!isset($_SESSION['Admin'])) {
            header("location:./client/view/layout/sign-in-page.php?");
        }
        ?>
    </div>

    <!-- danh sách tài khoản -->
    <section class="list-account">
        <div class="section-wrapper">
            <div class="section-container">
                <div class="section-title">Danh sách tài khoản</div>
                <div class="select-account">
                    <label for="accounts">Lọc tài khoản</label>
                    <div class="select-wrapper">
                        <select name="accounts" title="Lọc sản phẩm" id="selector">
                            <option value="all">Tất cả tài khoản</option>
                            <?php
                            while ($data_account_type = mysqli_fetch_assoc($get_account_type)) {
                            ?>
                                <option value="<?php echo $data_account_type['Type'] ?>">
                                    <?php echo $data_account_type['NameType'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div id="button-view" onclick="selectItemList()">
                        Hiển thị
                    </div>
                </div>
                <div id="table-list">
                    <table class="list-view">
                        <tr>
                            <th width="30%">Tên đăng nhập</th>
                            <th width="50%">Tên người dùng</th>
                            <th width="20%">Tuỳ chọn</th>
                        </tr>
                        <?php
                        while ($data_all_account = mysqli_fetch_assoc($get_all_account)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $data_all_account['Username'] ?>
                                </td>
                                <td>
                                    <?php echo $data_all_account['Name'] ?>
                                </td>
                                <td>
                                    <div class="option" id="<?php echo $data_all_account['Username'] ?>"
                                        onclick="selectItemToUpdate(this.id)">
                                        Chỉnh sửa
                                    </div>
                                    <div class="option"
                                        onclick="deleteItem('<?php echo $data_all_account['Username'] ?>', '<?php echo $data_all_account['Type'] ?>')">
                                        Xoá
                                    </div>
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

    <!-- chỉnh sửa tài khoản -->
    <section class="account-fix">
        <div class="section-wrapper">
            <div class="section-container">
                <div class="section-title">Thông tin tài khoản</div>
                <div class="infomation-list" id="infomation-list">
                    Hãy chọn tài khoản cần chỉnh sửa
                </div>
            </div>
        </div>
    </section>

    <!-- thêm mới tài khoản -->
    <section class="add-account">
        <div class="section-wrapper">
            <div class="section-container">
                <div class="section-title">Thêm mới tài khoản</div>
                <div class="ic-name" style="text-align:center">
                    Loại tài khoản:
                </div>
                <div class="ic-content">
                    <select name="accounts" title="Lọc sản phẩm" id="add-accounttype">
                        <option value="all">Chọn loại tài khoản</option>
                        <?php
                        while ($account_type = mysqli_fetch_assoc($get_account_type02)) {
                        ?>
                            <option value="<?php echo $account_type['Type'] ?>">
                                <?php echo $account_type['NameType'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="infomation-list" id="add-content">
                    <ul class="infomation-content">
                        <li>
                            <div class="ic-name">
                                Tên đăng nhập:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="text" name="" id="add-username" required="">
                            </div>
                        </li>
                        <li>
                            <div class="ic-name">
                                Mật khẩu:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="text" name="" id="add-pass" required="">
                            </div>
                        </li>
                        <li>
                            <div class="ic-name">
                                Tên người dùng:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="text" name="" id="add-name" required="">
                            </div>
                        </li>
                        <li>
                            <div class="ic-name">
                                Số điện thoại:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="tel" name="phonenumber" id="add-tel" placeholder="0123456789" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" required="">
                            </div>
                        </li>
                        <li>
                            <div class="ic-name">
                                Địa chỉ Email:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="email" name="emailaddress" id="add-email" placeholder="Email" required="">
                            </div>
                        </li>
                        <li>
                            <div class="ic-name">
                                Địa chỉ:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="text" name="" id="add-address">
                            </div>
                        </li>
                        <li>
                            <div id="button-add" onclick="testAdd()">Thêm mới</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="../../script/admin-page-2.js"></script>
</body>

</html>