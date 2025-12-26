<?php
require_once("../config/serverConfig.php");


$connect = mysqli_connect($hostname, $username, $password, $database);

if ($connect->connect_error) {
    die("Connection Failed" . $connect->connect_error);
}
