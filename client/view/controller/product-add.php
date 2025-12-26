<!DOCTYPE html>
<html lang="en">

<body>
    <?php

    require_once 'sql-connection.php';

    //ItemName
    $selecteditem = $_GET['addItemname'];

    //ItemID id
    $itemid = $_GET['addItemid'];

    //ItemType

    $itemtype = $_GET['addItemType'];

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

    $update_query = "INSERT INTO product VALUES ('$selecteditem','$itemtype','$json_object')";

    mysqli_query($connect, $update_query);

    //hiển thị bảng thông tin sau khi add
    echo '<ul class="infomation-content" >
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
        </ul>';
    ?>
</body>

</html>