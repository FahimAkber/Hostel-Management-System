<?php
    date_default_timezone_set("Asia/Dhaka");
    $date = date("d M y");
    $link = mysqli_connect('localhost', 'root', '', 'hostel_management');
    $query = "select sum(afternoon) as afternoon , sum(night) as night from meals where date = '$date'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);
    $sum = 0;
    $afternoon = 0;
    $night = 0;
    if($data != null){
        $sum = $data["afternoon"] + $data["night"];
        $afternoon = $data["afternoon"];
        $night = $data["night"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="icon" type="image/png" href="LogIn/images/icons/favicon.ico"/>
    <link rel="stylesheet" href="adminstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <?php include "admin_nav-bar.php"?>
    <div class="main_content">
        <div class="header">Confirm Meal</div>
        <div class="info" style="margin-top: 5%; margin-left: 25%">
            <table border="1" width="50%">
                <tr>
                    <th>Period</th>
                    <th>Count</th>

                </tr>
                <tr>
                    <th>Afternoon</th>
                    <th style="color: #7e82de"><?= $afternoon ?></th>
                </tr>
                <tr>
                    <th>Night</th>
                    <th style="color: #7e82de"><?= $night ?></th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th style="color: #de4b70"><?= $sum ?></th>
                </tr>

            </table>
        </div>
    </div>

</div>

</body>

</html>