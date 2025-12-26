<!DOCTYPE html>
<html lang="en">

<body>
    <?php

    require_once 'sql-connection.php';

    if (isset($_GET['selecteditem'])) {
        $selecteditem = $_GET['selecteditem'];

        if ($selecteditem == "all") {
            $query_selected_account = "SELECT * FROM user";
        } else {
            $query_selected_account = "SELECT * FROM user where Type = '$selecteditem'";
        }

        $get_selected_account = mysqli_query($connect, $query_selected_account);

        echo '<table class="list-view">
        <tr>
        <th width="30%">Tên đăng nhập</th>
        <th width="50%">Tên người dùng</th>
        <th width="20%">Tuỳ chọn</th>
        </tr>';

        while ($data_all_account = mysqli_fetch_assoc($get_selected_account)) {
            echo '<tr>';
            echo '<td>' . $data_all_account['Username'] . '</td>';
            echo "<td>" . $data_all_account['Name'] . "</td>";
            echo '<td>
            <div class="option" id="' . $data_all_account['Username'] . '" onclick="selectItemToUpdate(this.id)">
                Chỉnh sửa
            </div>
            <div class="option" id="' . $data_all_account['Username'] . '" onclick="deleteItem(' . $data_all_account['Username'] . ', ' . $data_all_account['Type'] . ')">
                Xoá
            </div>
        </td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    if (isset($_GET['selecteditemtoupdate'])) {
        $selecteditem = $_GET['selecteditemtoupdate'];

        $query_selected_account = "SELECT * FROM user where Username = '$selecteditem'";

        $get_selected_account = mysqli_query($connect, $query_selected_account);

        $data_selected = mysqli_fetch_assoc($get_selected_account);


        echo '<ul class="infomation-content">
                <li>
                    <div class="ic-name">
                        Tên đăng nhập:
                    </div>';
        echo '<div class="ic-content" id="update-username">' . $data_selected['Username'] . '</div>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Mật khẩu:
                    </div>';
        echo '<div class="ic-content" id="update-pass">' . $data_selected['Password'] . '</div>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Loại tài khoản:
                    </div>';
        echo '<div class="ic-content" id="update-accounttype">' . $data_selected['Type'] . '</div>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Tên người dùng:
                    </div>';
        echo '<div class="ic-content">
                <input title="none" type="text" name="" id="update-name" required="" value="' . $data_selected['Name'] . '">
            </div>';
        echo '</li>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Số điện thoại:
                    </div>';
        echo '<div class="ic-content">
                <input title="none" type="tel" name="phonenumber" id="update-tel" placeholder="0123456789" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" required="" value="' . $data_selected['PhoneNumber'] . '">
            </div>';
        echo '</li>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Email:
                    </div>';
        echo '<div class="ic-content">
                <input title="none" type="email" name="emailaddress" id="update-email" placeholder="Email" required="" value="' . $data_selected['EmailAddress'] . '">
            </div>';
        echo '</li>';
        echo '</li>
                <li>
                    <div class="ic-name">
                        Địa chỉ:
                    </div>';
        echo '<div class="ic-content">
                <input title="none" type="text" name="" id="update-address" required="" value="' . $data_selected['Address'] . '">
            </div>';
        echo '</li>';
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