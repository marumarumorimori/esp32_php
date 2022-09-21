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
$now = $objDateTime->format('H:i');
$lightstatus = $row["status"];

$sql = "SELECT * FROM reserve_time WHERE action_time LIKE :now AND action =1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('now',$now, PDO::PARAM_STR);
$stmt->execute();
$on = $stmt->fetch();

$sql = "SELECT * FROM reserve_time WHERE action_time LIKE :now AND action =0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('now',$now, PDO::PARAM_STR);
$stmt->execute();
$off = $stmt->fetch();

if(!$on == FALSE) {
    echo "on";
    $sql = "UPDATE light_status SET status=1 WHERE id=1";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute()) {
        sleep(6);
        $sql = "DELETE FROM reserve_time WHERE action_time LIKE :now AND action =1 ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('now',$now, PDO::PARAM_STR);
        $stmt->execute();
        header('location:../view/onoff.php');
    }else {
        echo "エラー";
    }

}

if(!$off == FALSE) {
    echo "off";
    $sql = "UPDATE light_status SET status=0 WHERE id=1";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute()) {
        sleep(6);
        $sql = "DELETE FROM reserve_time WHERE action_time LIKE :now AND action =0 ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('now',$now, PDO::PARAM_STR);
        $stmt->execute();
        header('location:../view/onoff.php');
    }else {
        echo "エラー";
    }


}

$now = $now. ":00";
    if($now == $ontime) {
        echo "on";
        $sql = "UPDATE light_status SET status=1 WHERE id=1";
        $stmt = $pdo->prepare($sql);
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

    if($now == $offtime) {
        echo "off";
        $sql = "UPDATE light_status SET status=0 WHERE id=1";
        $stmt = $pdo->prepare($sql);
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
