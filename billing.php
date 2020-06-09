<?php
    date_default_timezone_set("Asia/Dhaka");
    $month = date("m");
    $findMonth =  $month -1;
    $monthDate = date("d");


    $link = mysqli_connect('localhost', 'root', '', 'hostel_management');
    $query = "select  uId, sum(afternoon) as afternoon, sum(night) as night from meals  where MONTH(date) = '$findMonth' group by uId";

    if($monthDate ==6){
        $result = mysqli_query($link, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <?php if($monthDate == 6): ?>
                <table border="1" width="50%">
                <tr>
                    <th>Id</th>
                    <th>Afternoon Meals</th>
                    <th>Night Meals</th>
                    <th>Total Meal</th>
                    <th>Action</th>

                </tr>
                <?php
                foreach ($data as $datum):
                    ?>
                    <tr>
                        <th><?= $datum["uId"] ?></th>
                        <th><?= $datum["afternoon"] ?></th>
                        <th><?= $datum["night"] ?></th>
                        <th><?= $datum["afternoon"] + $datum["night"] ?></th>
                        <th>
                            <form method="post" action="billing2.php">
                                <button type="submit" value="<?= $datum["uId"] ?>" name="uId">Make Bill</button>
                            </form>
                        </th>
                    </tr>
                <?php endforeach;?>


            </table>
            <?php else: ?>
                <h3>You can make Bill on the first day of month</h3>
            <?php endif; ?>
        </div>
    </div>

</div>

</body>

</html>