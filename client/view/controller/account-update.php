<!DOCTYPE html>
<html lang="en">

<body>
    <?php
// =============================
// Chức năng: Cập nhật thông tin tài khoản
// Nhận dữ liệu cập nhật từ biến GET, xử lý và cập nhật vào bảng user
// =============================

    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

    $updateString = $_GET['updateString'];

    $data = explode('^', $updateString);

    $username = $data[0];
    $password = $data[1];
    $type = $data[2];
    $name = $data[3];
    $tel = $data[4];
    $email = $data[5];
    $address = $data[6];

    $query_update = "UPDATE user SET `Username`='$username',`Password`='$password',`Type`='$type',`Name`='$name',`PhoneNumber`='$tel',`EmailAddress`='$email',`Address`='$address' WHERE Username='$username'";

    mysqli_query($connect, $query_update);


    //hiển thị bảng thông tin sau khi update
    $query_selected_account = "SELECT * FROM user where Username = '$username'";

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

    ?>
</body>

</html>