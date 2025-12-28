<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-apple-store-clone/client/connection/sql-connection.php';

$query_selectAllBill = "SELECT * FROM bill";

$queryData = mysqli_query($connect, $query_selectAllBill);

$data = [];

while ($fetchedData = mysqli_fetch_assoc($queryData)) {
    $data[] = $fetchedData;
};
