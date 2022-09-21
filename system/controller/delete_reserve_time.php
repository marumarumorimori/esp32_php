<?php
ini_set('display_errors', "On");
require_once "../dbconnect.php";
$pdo = get_pdo();

$sql = "DELETE FROM reserve_time WHERE id = :id ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id',$_POST["time_id"], PDO::PARAM_INT);

if($stmt->execute()) {
   header("location:../view/reservetime.php");
}