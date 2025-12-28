<?php

session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("location:/PHP-apple-store-clone/client/view/layout/main-page.php");
}
