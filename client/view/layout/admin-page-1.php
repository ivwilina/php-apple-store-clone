<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/view/controller/admin-onload.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="/PHP-apple-store-clone/client/view/style/admin-page-1.css">
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

    <!-- danh sách sản phẩm -->
    <section class="list-product">
        <div class="section-wrapper">
            <div class="section-container">
                <div class="section-title">Danh sách sản phẩm</div>
                <div class="select-product">
                    <label for="products">Lọc sản phẩm</label>
                    <div class="select-wrapper">
                        <select name="products" title="Lọc sản phẩm" id="selector">
                            <option value="all">Tất cả sản phẩm</option>
                            <?php
                            while ($data_product_type = mysqli_fetch_assoc($get_product_type)) {
                                ?>
                                <option value="<?php echo $data_product_type['ItemType'] ?>">
                                    <?php echo $data_product_type['ItemType'] ?>
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
                            <th width="30%">ID</th>
                            <th width="50%">Tên sản phẩm</th>
                            <th width="20%">Tuỳ chọn</th>
                        </tr>
                        <?php
                        while ($data_all_product = mysqli_fetch_assoc($get_all_product)) {
                            $infomation = json_decode($data_all_product['Specs']);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $infomation->id ?>
                                </td>
                                <td>
                                    <?php echo $data_all_product['ItemName'] ?>
                                </td>
                                <td>
                                    <div class="option" id="<?php echo $data_all_product['ItemName'] ?>"
                                        onclick="selectItemToUpdate(this.id)">
                                        Chỉnh sửa
                                    </div>
                                    <div class="option"
                                        onclick="deleteItem('<?php echo $data_all_product['ItemName'] ?>', '<?php echo $data_all_product['ItemType'] ?>')">
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


    <!-- chỉnh sửa sản phẩm -->
    <section class="product-fix">
        <div class="section-wrapper">
            <div class="section-container">
                <div class="section-title">Thông tin sản phẩm</div>
                <div class="infomation-list" id="infomation-list">
                    Hãy chọn sản phẩm cần chỉnh sửa
                </div>
            </div>
        </div>
    </section>


    <!-- thêm mới sản phẩm -->
    <section class="add-product">
        <div class="section-wrapper">
            <div class="section-container">
                <div class="section-title">Thêm mới sản phẩm</div>
                <div class="ic-name" style="text-align:center">
                    Loại sản phẩm:
                </div>
                <div class="ic-content">
                    <select name="products" title="Lọc sản phẩm" id="add-itemtype">
                        <option value="all">Chọn loại sản phẩm</option>
                        <?php
                        while ($product_type = mysqli_fetch_assoc($get_product_type02)) {
                            ?>
                            <option value="<?php echo $product_type['ItemType'] ?>">
                                <?php echo $product_type['ItemType'] ?>
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
                                Tên sản phẩm:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="text" name="" id="add-itemname">
                            </div>
                        </li>
                        <li>
                            <div class="ic-name">
                                ID sản phẩm:
                            </div>
                            <div class="ic-content">
                                <input title="none" type="text" name="" id="add-itemid">
                            </div>
                        </li>
                        <li class="table-list">
                            <table class="list-view" id="table-1a">
                                <tr>
                                    <th colspan=2>
                                        Thông số kĩ thuật
                                        <span class="row-option" id="a-1a" onclick="addRows2(this.id)">Thêm dòng</span>
                                        <span class="row-option" id="d-1a" onclick="delRow2(this.id)">Xoá dòng</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="20%">
                                        Tên thông số
                                    </th>
                                    <th width="80%">
                                        Chi tiết
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input title="none" type="text" name="a-spec-infoname" id="" value="">
                                    </td>
                                    <td>
                                        <input title="none" type="text" name="a-spec-infodetail" id="" value="">
                                    </td>
                                </tr>
                            </table>
                        </li>

                        <li class="table-list">
                            <table class="list-view" id="table-2a">
                                <tr>
                                    <th colspan=2>
                                        Cấu hình khả dụng
                                        <span class="row-option" id="a-2a" onclick="addRows2(this.id)">Thêm dòng</span>
                                        <span class="row-option" id="d-2a" onclick="delRow2(this.id)">Xoá dòng</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="20%">
                                        Cấu hình
                                    </th>
                                    <th width="80%">
                                        Giá (đồng)
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input title="none" type="text" name="a-spec-choicesize" id="" value="">
                                    </td>
                                    <td>
                                        <input title="none" type="text" name="a-spec-choiceprice" id="" value="">
                                    </td>
                                </tr>
                            </table>
                        </li>

                        <li class="table-list">
                            <table class="list-view" id="table-3a">
                                <tr>
                                    <th colspan=2>
                                        Màu sắc khả dụng
                                        <span class="row-option" id="a-3a" onclick="addRows2(this.id)">Thêm dòng</span>
                                        <span class="row-option" id="d-3a" onclick="delRow2(this.id)">Xoá dòng</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="20%">
                                        Màu sắc
                                    </th>
                                    <th width="80%">
                                        Mã màu hiển thị
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input title="none" type="text" name="a-spec-colorcolor" id="" value="">
                                    </td>
                                    <td>
                                        <input title="none" type="text" name="a-spec-colorhex" id="" value="">
                                    </td>
                                </tr>
                            </table>
                        </li>

                        <li class="table-list">
                            <table class="list-view" id="table-4a">
                                <tr>
                                    <th colspan=2>
                                        Ảnh sản phẩm
                                        <span class="row-option" id="a-4a" onclick="addRows2(this.id)">Thêm dòng</span>
                                        <span class="row-option" id="d-4a" onclick="delRow2(this.id)">Xoá dòng</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="20%">
                                        Màu sắc
                                    </th>
                                    <th width="80%">
                                        Nguồn
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input title="none" type="text" name="a-spec-sourcecolor" id="" value="">
                                    </td>
                                    <td>
                                        <input title="none" type="text" name="a-spec-sourcepath" id="" value="">
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <div id="button-add" onclick="testAdd()">Thêm mới</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script src="/PHP-apple-store-clone/client/script/admin-page-1.js"></script>
</body>

</html>