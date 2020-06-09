<?php

    function getField($field_name){
        if(!empty($_POST[$field_name])){
            return $_POST[$field_name];
        }else{
            return null;
        }

    }

    $uId =  getField("uId");
    $month = date("m");
    $findMonth =  $month -1;
    $link = mysqli_connect('localhost', 'root', '', 'hostel_management');

    $setBilInfo = "insert into bill(uId, monthEndBill, month) values ('$uId', 0, 0)";
    mysqli_query($link, $setBilInfo);

    $query = "select name, mail, vId, sum(afternoon) as afternoon, sum(night) as night, dues from users 
                join meals m on users.id = m.uId
                join bill b on users.id = b.uId
                join seatrequest s on users.id = s.uId
          where users.id = '$uId' and MONTH(m.date) = '$findMonth'";


    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $bName = getField("name");
    $bvId = getField("vId");
    $bAfternoon = getField("afternoon");
    $bNight = getField("night");
    $bTotal = $bAfternoon+$bNight;
    $bDues = getField("dues");
    $bMail = getField("mail");

    if($bName != null && $bvId != null && $bAfternoon != null && $bTotal !=  null && $bMail != null){
        $seatFare = 2500;
        $serviceCharge = 1000;
        $perMealCost = 50;
        $monthEndBill = $bTotal*$perMealCost + $seatFare + $serviceCharge + $bDues;

        $setBill = "insert into bill(uId, monthEndBill, month) values ('$uId', '$monthEndBill', '$month')";
        mysqli_query($link, $setBill);

        $delete = "delete * from bill where month = 0";
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
        <div class="header">Monthend Bill(Meal List)</div>
        <div class="info" style="margin-top: 5%; margin-left: 25%">
            <table border="1" width="50%">
                <tr>
                    <th>Name</th>
                    <th>versity Id</th>
                    <th>Afternoon Meals</th>
                    <th>Night Meals</th>
                    <th>Total Meal</th>
                    <th>Dues</th>
                    <th>Action</th>

                </tr>
                
                <?php foreach ($data as $datum) ?>

                    <tr>
                        <td><?= $datum["name"] ?></td>
                        <td><?= $datum["vId"] ?></td>
                        <td><?= $datum["afternoon"] ?></td>
                        <td><?= $datum["night"] ?></td>
                        <td><?= $datum["afternoon"]+$datum["night"] ?></td>
                        <td><?= $datum["dues"] ?></td>
                        <td>
                            <form action="billing2.php" method="post">
                                <input type="hidden" name="uId" value="<?= $uId ?>">
                                <input type="hidden" name="name" value="<?= $datum["name"] ?>">
                                <input type="hidden" name="vId" value="<?= $datum["vId"] ?>">
                                <input type="hidden" name="afternoon" value="<?= $datum["afternoon"] ?>">
                                <input type="hidden" name="night" value="<?= $datum["night"] ?>">
                                <input type="hidden" name="total" value="<?= $datum["total"] ?>">
                                <input type="hidden" name="dues" value="<?= $datum["dues"] ?>">
                                <input type="hidden" name="mail" value="<?= $datum["mail"] ?>">
                                <button type="submit">Inform</button>
                            </form>
                        </td>
                    </tr>

            </table>
        </div>
    </div>

</div>

</body>

</html>