<!DOCTYPE html>
<html lang="en">

<body>
    <?php
// =============================
// Chức năng: Xóa tài khoản khỏi hệ thống
// Nhận tên tài khoản cần xóa từ biến GET và thực hiện truy vấn xóa
// =============================

    require_once 'sql-connection.php';

    $selecteditem = $_GET['itemtodelete'];

    $itemtype = $_GET['itemtype'];
    $query_delete_product = "DELETE FROM product where ItemName = '$selecteditem'";

    $refresh_query =  "SELECT * FROM product where ItemType = '$itemtype'";

    mysqli_query($connect, $query_delete_product);
    $refresh = mysqli_query($connect, $refresh_query);

    echo '<table class="list-view">
        <tr>
        <th width="30%">ID</th>
        <th width="50%">Tên sản phẩm</th>
        <th width="20%">Tuỳ chọn</th>
        </tr>';

    while ($data_refresh = mysqli_fetch_assoc($refresh)) {
        $infomation = json_decode($data_refresh['Specs']);
        echo '<tr>';
        echo '<td>' . $infomation->id . '</td>';
        echo "<td>" . $data_refresh['ItemName'] . "</td>";
        echo '<td>
            <div class="option" id="' . $data_refresh['ItemName'] . '" onclick="selectItemToUpdate(this.id)">
                Chỉnh sửa
            </div>
            <div class="option" id="' . $data_refresh['ItemName'] . '" onclick="deleteItem(this.id)">
                Xoá
            </div>
        </td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>