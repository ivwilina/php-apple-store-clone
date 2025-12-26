<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" href="../style/sign-in-page.css">
    <link rel="shortcut icon" href="../../asset/icon/apple-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    
    <div class="navbar">
        <?php
            include_once './default-header.php';
            ?>
        </div>
        
        <section>
            <div class="all-container" id="main">
                <div class="sign-up">
                    <form action="../controller/login-process.php" method="POST">
                        <h1>Tạo Tài Khoản</h1>
                        <input type="text" name="username" placeholder="Tên đăng nhập" required="">
                        <input type="password" name="password" placeholder="Mật khẩu" required="">
                        <input type="text" name="name" placeholder="Tên người dùng" required="">
                        <input type="tel" name="phonenumber" placeholder="0123456789" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" required="">
                        <input type="email" name="emailaddress" placeholder="Email" required="">
                        <input type="text" name="address" placeholder="Địa chỉ" required="">
                        <button name="signup">Tạo tài khoản</button>
                    </form>
                </div>
    
                <div class="sign-in">
                    <form action="../controller/login-process.php" method="POST">
                        <h1>Đăng nhập</h1>
                            <?php
                            if (isset($_GET['Invalid'])) {
                                if ($_GET['Invalid'] == true) {
                                    ?>
                                    <div class="alert">
                                        Tên đăng nhập hoặc mật khẩu không chính xác!
                                    </div>
                                    <?php
                                }
                            }

                            ?>
                        <input type="text" name="username" placeholder="Tên đăng nhập" required="">
                        <input type="password" name="password" placeholder="Mật khẩu" required="">
                        <a href="#">Quên mật khẩu?</a>
                        <button name="signin">Đăng nhập</button>
                    </form>
                </div>

                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-left">
                            <h1>Apple Authorized Store</h1>
                            <p>Chào mừng quay trở lại, đăng nhập để tiếp tục trải nghiệm mua sắm nào!</p>
                            <button id="signIn">Đăng nhập</button>
                        </div>
                        <div class="overlay-right">
                            <h1>Apple Authorized Store</h1>
                            <p>Nhập thông tin cá nhân và bắt đầu khám phá gian hàng của Apple Store!</p>
                            <button id="signUp">Tạo tài khoản</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            const signUpButton =document.getElementById('signUp');
            const signInButton =document.getElementById('signIn');
            const main =document.getElementById('main');

            signUpButton.addEventListener('click', () => {
                main.classList.add("right-panel-active");
            });

            signInButton.addEventListener('click', () => {
                main.classList.remove("right-panel-active");
            });
        </script>
</body>

</html>