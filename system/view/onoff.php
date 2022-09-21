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
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/onoff.css">
</head>
<body>
<div class="header">
    <p class="header_title">OOの電気</p>
</div>
<div class="lightContainer">
<div class="light_status">
    <!-- <div class="light_status_img lightState ">on</div> -->
    <p class="light_status_text"><?php echo $lightstatus ?></p>
</div>

<form action="../controller/store_status.php" method="POST" class="buttons">
    <input type="submit" name="on" value="on" class="onBTN">
    <input type="submit" name="off"  value="off" class="offBTN">
</form>
</div>
<div class="footer">
<ul class="footernav">
    <li><a href="onoff.php" class="icon"><i class="fas fa-lightbulb"></i></a></li>
    <li><a href="insert_light.php" class="icon"><i class="fas fa-plus"></i></a></li>
    <li><a href="reservetime.php" class="icon"><i class="fas fa-stream"></i></a></li>
</ul>
</div>
</body>
</html>