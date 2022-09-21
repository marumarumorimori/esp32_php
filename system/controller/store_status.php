<?php
require_once "../dbconnect.php";


$pdo = get_pdo();

if(isset($_POST["on"])) {

// 時間になったら消したりつけたりする
date_default_timezone_set('Asia/Tokyo');
$objDateTime = new DateTime();
$now = $objDateTime->format('H:i');


// $query = "INSERT INTO light_status (ontime,offtime) VALUE ($on_time ,$off_time) ";
$sql = "UPDATE light_status SET ontime=:ontime,status=1 WHERE id=1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('ontime', $now, PDO::PARAM_STR);

if($stmt->execute()) {
    sleep(6);
    $sql = "UPDATE light_status SET ontime=:ontime WHERE id=1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('ontime', "00:00:00", PDO::PARAM_STR);
    $stmt->execute();
    header('location:../view/onoff.php');
}else {
    echo "エラー";
}

}


if(isset($_POST["off"])) {

    // 時間になったら消したりつけたりする
    date_default_timezone_set('Asia/Tokyo');
    $objDateTime = new DateTime();
    $now = $objDateTime->format('H:i');


    // $query = "INSERT INTO light_status (ontime,offtime) VALUE ($on_time ,$off_time) ";
    $sql = "UPDATE light_status SET offtime=:offtime,status=0 WHERE id=1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('offtime', $now, PDO::PARAM_STR);


    if($stmt->execute()) {
        sleep(6);
        $sql = "UPDATE light_status SET offtime=:offtime WHERE id=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('offtime', "00:00:00", PDO::PARAM_STR);
        $stmt->execute();
        header('location:../view/onoff.php');
    }else {
        echo "エラー";
    }

    }
