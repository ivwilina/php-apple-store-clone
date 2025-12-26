<?php

require_once 'sql-connection.php';
session_start();
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $name = $_POST['name'];
    $tel = $_POST['phonenumber'];
    $email = $_POST['emailaddress'];
    $address = $_POST['add-address'];

    $query_update = "UPDATE user SET `Username`='$username',`Password`='$password',`Name`='$name',`PhoneNumber`='$tel',`EmailAddress`='$email',`Address`='$address' WHERE Username='$username'";

    mysqli_query($connect, $query_update);

    session_destroy();
    header("location:../layout/sign-in-page.php?");
}
