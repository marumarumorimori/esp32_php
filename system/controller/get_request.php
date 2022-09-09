<?php
ini_set('display_errors', "On");
require_once "../dbconnect.php";
require_once "func.php";

$pdo = get_pdo();

if(!empty($_GET)) {
    $intstatus =intval($_GET["data"]);
    $query =    "UPDATE light_status SET status = :intstatus WHERE id=1";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue('intstatus', $intstatus, PDO::PARAM_INT);
    $stmt->execute();
    echo strval($intstatus);
}