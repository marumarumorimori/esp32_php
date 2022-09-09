<?php
// require_once "../controller/exc_ontime.php";
// require_once "../controller/get_request.php";
ini_set('display_errors', "On");
require_once "../dbconnect.php";
$pdo = get_pdo();

$query = "SELECT * FROM light_status";
$stmt = $pdo->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
$ontime =$row["ontime"];
$offtime =$row["offtime"];
$lightstatus =$row["status"];
// var_dump($lightstatus);
if($lightstatus == "1") {
    $lightstatus = "ついています";
}else {
    $lightstatus = "消えています";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../htdocs/css/styles.css">
</head>
<body>
    <p>予約したon時間:<?php echo $ontime ?></p>
    <p>予約したoff時間:<?php echo $offtime ?></p>
    <p>今の状態；<?php echo $lightstatus?></p>
    <form action="../controller/store_light.php" method="POST">

    <h1>予約時間の登録</h1>
    <div>
            <p>消したい時間</p>
            <input type="time" name="ontime" require>
        </div>
        <div>
            <p>つけたい時間</p>
            <input type="time" name="offtime" require>
        </div>
        <input type="submit" value="送信">
    </form>
</body>
</html>