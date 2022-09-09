<?php

ini_set('display_errors', "On");
require_once "../dbconnect.php";
require_once "func.php";
// require_once "exc_ontime.php";
$pdo = get_pdo();
$on_time = $_POST["ontime"].":00";
$off_time = $_POST["offtime"].":00";

// $query = "INSERT INTO light_status (ontime,offtime) VALUE ($on_time ,$off_time) ";
$sql = "UPDATE light_status SET ontime=:ontime,offtime=:offtime WHERE id=1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('ontime', $on_time, PDO::PARAM_STR);
$stmt->bindValue('offtime', $off_time, PDO::PARAM_STR);
$stmt->execute();


if($stmt->execute()) {
    header('location:../view/insert_light.php');
}else {
    echo "エラー";
}