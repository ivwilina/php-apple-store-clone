<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

$array = $_GET['checkout'];

$data = explode('$', $array);

$billId = $data[0];
$cusName = $data[1];
$cusTel = $data[2];
$cusAddress = $data[3];
$totalPrice = $data[4];

$CustomerInfo = array($cusName, $cusTel, $cusAddress);

$itemName = [];
$itemChoice = [];
$itemColor = [];
$itemPrice = [];
$itemQuantity = [];

for ($i = 5; $i < count($data); $i++) {
    $product = explode('^', $data[$i]);
    $itemID[] = $product[0];
    $itemName[] = $product[1];
    $itemChoice[] = $product[2];
    $itemColor[] = $product[3];
    $itemPrice[] = $product[4];
    $itemQuantity[] = $product[5];
}

$BillItem = array();
for ($i = 0; $i < count($itemName); $i++) {
    $temparray = array($itemName[$i], $itemChoice[$i], $itemColor[$i], $itemPrice[$i], $itemQuantity[$i]);
    array_push($BillItem, $temparray);
}

$json_user = json_encode($CustomerInfo, JSON_UNESCAPED_UNICODE);

$json_item = json_encode($BillItem, JSON_UNESCAPED_UNICODE);

$add_query = "INSERT INTO bill VALUES ('$billId','$totalPrice','$json_user','$json_item')";

mysqli_query($connect, $add_query);

for ($i = 0; $i < count($itemID); $i++) {
    $query = "DELETE FROM bag WHERE BagId='$itemID[$i]'";
    mysqli_query($connect, $query);
}
