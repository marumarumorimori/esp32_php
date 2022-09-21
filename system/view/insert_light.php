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
    <link rel="stylesheet" href="css/insert_light.css">
</head>
<body>

<div class="header">
    <p class="header_title">OOの電気</p>
</div>

<div class="reservetime_container">

<h1 class="reservedtime_title">予約時間の登録</h1>

<form action="../controller/store_light.php" method="POST" class="reservedtime_form">
        <div class="input_timevalue">
            <p>時間</p>
            <input type="time" name="time" required>
        </div>

        <div class="onoff">
            <select name="action" class="input_timevalue" required>
            <option value="">ONかOFFを選んでください</option>
                <option value="1">ON</option>
                <option value="0">OFF</option>
            </select>
        </div>
        <input type="submit" value="送信する" class="reservedtime_form_submit">
    </form>
<div class="footer">
<ul class="footernav">
    <li><a href="onoff.php" class="icon"><i class="fas fa-lightbulb"></i></a></li>
    <li><a href="insert_light.php" class="icon"><i class="fas fa-plus"></i></a></li>
    <li><a href="reservetime.php" class="icon"><i class="fas fa-stream"></i></a></li>
</ul>
</div>
</div>

</body>
</html>