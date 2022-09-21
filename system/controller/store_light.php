<?php

ini_set('display_errors', "On");
require_once "../dbconnect.php";
require_once "func.php";
// require_once "exc_ontime.php";

$time = $_POST["time"];
$action = intval($_POST["action"]);
$light_id = 1;

$pdo = get_pdo();
// $query = "INSERT INTO light_status (ontime,offtime) VALUE ($on_time ,$off_time) ";
$sql = "INSERT INTO reserve_time (light_id, action, action_time) VALUES(:light_id, :action, :action_time);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':light_id', $light_id, PDO::PARAM_INT);
$stmt->bindValue(':action', $action, PDO::PARAM_INT);
$stmt->bindValue(':action_time', $time, PDO::PARAM_STR);


if($stmt->execute()) {
    header("location:../view/insert_light.php");
}else {
    echo "エラー";
}