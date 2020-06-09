<?php
    include "logCheck.php";
    date_default_timezone_set("Asia/Dhaka");
    $currentTime = date("H");



    function getField($field_name){
        if(!empty($_POST[$field_name])){
            return $_POST[$field_name];
        }else{
            return null;
        }

    }

    $afternoon = getField("afternoon");
    $night = getField("night");
    $uId = $_SESSION["id"];
    $date = date(" ");

    $link = mysqli_connect('localhost', 'root', '', 'hostel_management');
    $getData = "select * from meals where uId = '$uId' and date = '$date'";
    $result = mysqli_query($link, $getData);
    $data = mysqli_fetch_assoc($result);

    $query = "select status from seatrequest where uId = '$uId'";
    $get = mysqli_query($link, $query);
    $status = mysqli_fetch_assoc($get);


    if($status["status"] != 2){
        $currentTime = 1000;
    }  else{
        if($data == null){
            if($afternoon != null && $night != null){
                $query = "insert into meals(uId, afternoon, night, date) values ('$uId', '$afternoon', '$night', '$date')";
                mysqli_query($link, $query);
            }
        }else{
            $currentTime = 100;
        }
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="icon" type="image/png" href="LogIn/images/icons/favicon.ico"/>
    <link rel="stylesheet" href="userstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <?php include "nav-bar.php"?>
    <div class="main_content">
        <div class="header">Order Meal</div>
        <div class="info">

            <?php
            if($currentTime >8 && $currentTime < 11):?>
                <h4 style="text-align: center;">Today's Meal.</h4>

                <div style="border: 5px; margin-top: 5%; margin-left: 25%; center; background-color: #fef9fd; width: fit-content; padding: 10px">
                    <form action="" method="post">
                        <input name="afternoon" type="text" style="padding: 10px; width:300px;margin-bottom: 5px;  background-color: #e7f2fa; border-radius: 10px"
                               placeholder="Afternoon Meal"><br>
                        <input name="night" type="text" style="padding: 10px; width:300px;margin-bottom: 5px;  background-color: #e7f2fa; border-radius: 10px"
                               placeholder="Night Meal"><br>

                        <button type="submit" style="padding: 10px; color: white; font-weight: bold; width:300px;margin-bottom: 5px;  background-color: #b1cccc; border-radius: 10px">
                            Apply
                        </button>
                    </form>
                </div>
            <?php
            elseif($currentTime == 100): ?>
                <h4 style="text-align: center; color: #ed5d56">You have already ordered todays meal.</h4>
            <?php
            elseif($currentTime == 1000): ?>
                <h4 style="text-align: center; color: #ed5d56">You have no Seat in our hostel.</h4>
            <?php
            else: ?>
                <h4 style="text-align: center; color: #ed5d56">You have to order your meal in 9AM to 11AM.</h4>
            <?php endif; ?>


        </div>
    </div>

</div>

</body>

</html>