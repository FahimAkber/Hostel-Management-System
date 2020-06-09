<?php
    include "logCheck.php";
    $seatData = 0;
    $uId = $_SESSION["id"];

    $link = mysqli_connect("localhost", "root", "", "hostel_management");
    $query = "select * from seatrequest where uId = '$uId'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);

    if($data != null){
        $seatData = $data["status"];
    }



    function getField($field_name){
        if(!empty($_POST[$field_name])){
            return $_POST[$field_name];
        }else{
            return null;
        }

    }

    $vId = getField("vId");
    $sec = getField("section");
    $department = getField("department");
    $advisor = getField("advisor");

    if($uId != null && $vId != null && $sec != null && $department != null && $advisor != null) {
        $insert = "insert into seatrequest(uId, vId, section, department, advisor, status) values ('$uId', '$vId', '$sec', '$department', '$advisor', 1)";
        mysqli_query($link, $insert);
        header("location: applyforSeat.php");
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
        <div class="header">Apply For Seat</div>
        <div class="info">

            <?php

                if($seatData == 0):?>
                    <h4 style="text-align: center;">Applying for a seat against your hostel account.</h4>

                   <div style="border: 5px; margin-top: 5%; margin-left: 25%; center; background-color: #fef9fd; width: fit-content; padding: 10px">
                       <form action="" method="post">
                           <input name="vId" type="text" style="padding: 10px; width:300px;margin-bottom: 5px;  background-color: #e7f2fa; border-radius: 10px"
                                placeholder="Varsity Id"><br>
                           <input name="section" type="text" style="padding: 10px; width:300px;margin-bottom: 5px;  background-color: #e7f2fa; border-radius: 10px"
                                placeholder="Section"><br>
                           <input name="department" type="text" style="padding: 10px; width:300px;margin-bottom: 5px;  background-color: #e7f2fa; border-radius: 10px"
                                placeholder="Department"><br>
                           <input name="advisor" type="text" style="padding: 10px; width:300px;margin-bottom: 5px;  background-color: #e7f2fa; border-radius: 10px"
                                placeholder="Advisor Name"><br>
                           <button type="submit" style="padding: 10px; color: white; font-weight: bold; width:300px;margin-bottom: 5px;  background-color: #b1cccc; border-radius: 10px">
                               Apply
                           </button>
                       </form>
                   </div>

            <?php
                elseif($seatData == 1): ?>
                    <h4 style="text-align: center; color: #ebed56">Wait for approaving.</h4>

            <?php
                elseif($seatData == 2): ?>
                    <h4 style="text-align: center; color: #40d12e">You have a seat in our hostel.</h4>

            <?php endif?>

        </div>
    </div>

</div>

</body>

</html>

<?php








