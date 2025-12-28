<!DOCTYPE html>
<html lang="en">

<body>
    <?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

    if (isset($_GET['selecteditem'])) {
        $selecteditem = $_GET['selecteditem'];

        if ($selecteditem == "all") {
            $query_selected_product = "SELECT * FROM product";
        } else {
            $query_selected_product = "SELECT * FROM product where ItemType = '$selecteditem'";
        }

        $get_selected_product = mysqli_query($connect, $query_selected_product);

        echo '<table class="list-view">
        <tr>
        <th width="30%">ID</th>
        <th width="50%">Tên sản phẩm</th>
        <th width="20%">Tuỳ chọn</th>
        </tr>';

        while ($data_all_product = mysqli_fetch_assoc($get_selected_product)) {
            $infomation = json_decode($data_all_product['Specs']);
            echo '<tr>';
            echo '<td>' . $infomation->id . '</td>';
            echo "<td>" . $data_all_product['ItemName'] . "</td>";
            echo '<td>
            <div class="option" id="' . $data_all_product['ItemName'] . '" onclick="selectItemToUpdate(this.id)">
                Chỉnh sửa
            </div>
            <div class="option" id="' . $data_all_product['ItemName'] . '" onclick="deleteItem(' . $data_all_product['ItemName'] . ', ' . $data_all_product['ItemType'] . ')">
                Xoá
            </div>
        </td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    if (isset($_GET['selecteditemtoupdate'])) {
        $selecteditem = $_GET['selecteditemtoupdate'];

        $query_selected_product = "SELECT * FROM product where ItemName = '$selecteditem'";

        $get_selected_product = mysqli_query($connect, $query_selected_product);

        $data_selected = mysqli_fetch_assoc($get_selected_product);

        $json_data = json_decode($data_selected['Specs']);

        echo '<ul class="infomation-content">
                <li>
                    <div class="ic-name">
                        Tên sản phẩm:
                    </div>';
        echo '<div class="ic-content" id="update-itemname">' . $data_selected['ItemName'] . '</div>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        ID sản phẩm:
                    </div>';
        echo '<div class="ic-content" id="update-itemid">' . $json_data->id . '</div>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Loại sản phẩm:
                    </div>';
        echo '<div class="ic-content" id="update-itemtype">' . $data_selected['ItemType'] . '</div>';
        echo '</li>';
        echo    '<li class="table-list">
            <table class="list-view" id="table-1">';
        echo '<tr>
                    <th colspan=2>
                        Thông số kĩ thuật 
                        <span class="row-option" id="a-1" onclick="addRows(this.id)">Thêm dòng</span>
                        <span class="row-option" id="d-1" onclick="delRow(this.id)">Xoá dòng</span>
                    </th>
                </tr>
                <tr>
                    <th width="20%">
                        Tên thông số
                    </th>
                    <th width="80%">
                        Chi tiết
                    </th>
                </tr>';
        foreach ($json_data->information as $info) {
            echo '<tr>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-infoname" id="" value="' . $info->infoname . '">';
            echo '</td>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-infodetail" id="" value="' . $info->detail . '">';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>
        </li>';

        echo    '<li class="table-list">
            <table class="list-view" id="table-2">';
        echo '<tr>
                    <th colspan=2>
                        Cấu hình khả dụng
                        <span class="row-option" id="a-2" onclick="addRows(this.id)">Thêm dòng</span>
                        <span class="row-option" id="d-2" onclick="delRow(this.id)">Xoá dòng</span>
                    </th>
                </tr>
                <tr>
                    <th width="20%">
                        Cấu hình
                    </th>
                    <th width="80%">
                        Giá (đồng)
                    </th>
                </tr>';
        foreach ($json_data->choice as $choice) {
            echo '<tr>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-choicesize" id="" value="' . $choice->size . '">';
            echo '</td>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-choiceprice" id="" value="' . $choice->price . '">';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>
        </li>';

        echo    '<li class="table-list">
            <table class="list-view" id="table-3">';
        echo '<tr>
                    <th colspan=2>
                        Màu sắc khả dụng
                        <span class="row-option" id="a-3" onclick="addRows(this.id)">Thêm dòng</span>
                        <span class="row-option" id="d-3" onclick="delRow(this.id)">Xoá dòng</span>
                    </th>
                </tr>
                <tr>
                    <th width="20%">
                        Màu sắc
                    </th>
                    <th width="80%">
                        Mã màu hiển thị
                    </th>
                </tr>';
        foreach ($json_data->color as $color) {
            echo '<tr>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-colorcolor" id="" value="' . $color->color . '">';
            echo '</td>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-colorhex" id="" value="' . $color->hex . '">';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>
        </li>';

        echo    '<li class="table-list">
            <table class="list-view" id="table-4">';
        echo '<tr>
                    <th colspan=2>
                        Ảnh sản phẩm
                        <span class="row-option" id="a-4" onclick="addRows(this.id)">Thêm dòng</span>
                        <span class="row-option" id="d-4" onclick="delRow(this.id)">Xoá dòng</span>
                    </th>
                </tr>
            <tr>
                <th width="20%">
                    Màu sắc
                </th>
                <th width="80%">
                    Nguồn
                </th>
            </tr>';
        foreach ($json_data->imagesource as $source) {
            echo '<tr>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-sourcecolor" id="" value="' . $source->color . '">';
            echo '</td>';
            echo '<td>';
            echo '<input title="none" type="text" name="spec-sourcepath" id="" value="' . $source->source . '">';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>
                </li>
                <li>
                    <div id="button-update" onclick="testUpdate()">Cập nhật</div>
                </li>
            </ul>';
    }
    if (isset($_GET['update'])) {
        echo 'Sai cú pháp';
    }
    ?>
</body>

</html>