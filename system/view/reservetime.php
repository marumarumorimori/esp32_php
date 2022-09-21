<?php
require_once "../dbconnect.php";
$pdo = get_pdo();

$sql = "SELECT * FROM reserve_time";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$times = $stmt->fetchAll();



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
    <link rel="stylesheet" href="css/reservetime.css">
</head>
<body>
<div class="header">
    <p class="header_title">OOの電気</p>
</div>

<div class="reservedtime_list">
    <table class="reservedtime_list_table">
        <tr>
            <th>予約時間</th>
            <th>アクション</th>
            <th>削除</th>
        </tr>
        <?php foreach($times as $time): ?>
            <tr>
                <td><?php echo $time["action_time"]?></td>
                <td><?php
                if($time["action"] == 1) {
                    echo "on";
                }else {
                    echo "off";
                }
                ?></td>
                <td>
                    <form action="../controller/delete_reserve_time.php" method="POST">
                    <input type="hidden" name="time_id" value= "<?php echo $time["id"]; ?>">
                    <input type="submit" value="削除" class="delete_button">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

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