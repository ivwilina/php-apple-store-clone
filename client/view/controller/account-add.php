<!DOCTYPE html>
<html lang="en">

<body>
    <?php

    require_once 'sql-connection.php';

    $addString = $_GET['addString'];

    $data = explode('^', $addString);

    $username = $data[0];
    $password = $data[1];
    $type = $data[2];
    $name = $data[3];
    $tel = $data[4];
    $email = $data[5];
    $address = $data[6];

    $query_add = "INSERT INTO user VALUES('$username','$password','$type','$name','$tel','$email','$address')";

    mysqli_query($connect, $query_add);

    //hiển thị bảng thông tin sau khi add
    echo '<ul class="infomation-content">
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
        </ul>';
    ?>
</body>

</html>