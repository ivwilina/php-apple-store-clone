<!DOCTYPE html>
<html lang="en">

<body>
    <?php

    require_once 'sql-connection.php';

    //ItemName
    $selecteditem = $_GET['updateItemname'];

    //ItemID id
    $itemid = $_GET['updateItemid'];

    //ItemType

    $itemtype = $_GET['updateItemType'];

    //Item specification
    $info = $_GET['info'];

    $infoTemp = explode("|", $info);

    $specs_info = $infoTemp[0]; //thông số kĩ thuật
    $spec_choice = $infoTemp[1]; //cấu hình khả dụng
    $spec_color = $infoTemp[2]; //màu sắc khả dụng
    $spec_source = $infoTemp[3]; //ảnh sản phẩm

    $specs_info_item = explode("^", $specs_info);
    $spec_choice_item = explode("^", $spec_choice);
    $spec_color_item = explode("^", $spec_color);
    $spec_source_item = explode("^", $spec_source);

    $json_data_array = array("id" => $itemid);

    $spec_info_array = array();
    foreach ($specs_info_item as $item) {
        $temp = explode("$", $item);
        $temparray = array();
        $temparray['infoname'] = $temp[0];
        $temparray['detail'] = $temp[1];
        array_push($spec_info_array, $temparray);
    };

    $spec_choice_array = array();
    foreach ($spec_choice_item as $item) {
        $temp = explode("$", $item);
        $temparray = array();
        $temparray['size'] = $temp[0];
        $temparray['price'] = $temp[1];
        array_push($spec_choice_array, $temparray);
    };

    $spec_color_array = array();
    foreach ($spec_color_item as $item) {
        $temp = explode("$", $item);
        $temparray = array();
        $temparray['color'] = $temp[0];
        $temparray['hex'] = $temp[1];
        array_push($spec_color_array, $temparray);
    };

    $spec_source_array = array();
    foreach ($spec_source_item as $item) {
        $temp = explode("$", $item);
        $temparray = array();
        $temparray['color'] = $temp[0];
        $temparray['source'] = $temp[1];
        array_push($spec_source_array, $temparray);
    };

    $json_data_array['information'] = $spec_info_array;
    $json_data_array['choice'] = $spec_choice_array;
    $json_data_array['color'] = $spec_color_array;
    $json_data_array['imagesource'] = $spec_source_array;

    $json_object = json_encode($json_data_array, JSON_UNESCAPED_UNICODE);

    $update_query = "UPDATE `product` SET `ItemName`='$selecteditem',`ItemType`='$itemtype',`Specs`='$json_object' WHERE `ItemName`='$selecteditem'";

    mysqli_query($connect, $update_query);

    //hiển thị bảng thông tin sau khi update
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
    echo '</li>';
    echo '<li class="table-list">
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

    echo '<li class="table-list">
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

    echo '<li class="table-list">
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

    echo '<li class="table-list">
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

    ?>
</body>

</html>