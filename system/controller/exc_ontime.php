<?php
ini_set('display_errors', "On");
require_once "../dbconnect.php";
$pdo = get_pdo();


$query = "SELECT * FROM light_status";
$stmt = $pdo->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
$ontime =$row["ontime"];
$offtime =$row["offtime"];

// 時間になったら消したりつけたりする
date_default_timezone_set('Asia/Tokyo');
$objDateTime = new DateTime();
$now = $objDateTime->format('H:i:s');
$lightstatus = $row["status"];
// var_dump($now);

    if($now == $ontime) {
        echo "on";
        $sql = "UPDATE light_status SET status=1 WHERE id=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

    }else {
        echo "hello";
    }


    if($now == $offtime) {
        echo "off";
        $sql = "UPDATE light_status SET status=0 WHERE id=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }else {
        echo "hello";
    }
