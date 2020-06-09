<?php session_start();

$logData = "";
$a = "";

function getField($field_name){
    if(!empty($_POST[$field_name])){
        return $_POST[$field_name];
    }else{
        return null;
    }

}
$mail = getField("usermail");
$pass = getField("spass");



$link = mysqli_connect("localhost", "root", "", "hostel_management");

$query = "select * from users where mail = '$mail' and password = '$pass'";
$result = mysqli_query($link, $query);

$logData = mysqli_fetch_assoc($result);



if ($logData != null) {
    $_SESSION["isLogged"] = 1;
    $_SESSION["id"] = $logData["id"];
    header("location: index.php");
} else{
    if($mail != $logData["mail"]){
        $a = "Invalid Credential";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log in your Hostel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="LogIn/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LogIn/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LogIn/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LogIn/css/util.css">
	<link rel="stylesheet" type="text/css" href="LogIn/css/main.css">
<!--===============================================================================================-->
</head>
<body>




	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
                <h4 style="color: red; text-align: center"><?= $a?></h4>
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Student Login
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Mail is required">
						<input class="input100" type="text" name="usermail">
						<span class="label-input100">Student Mail</span>
					</div>
					
					
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="spass">
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Log in
						</button>
					</div>
					
					<div class="text-center w-full p-t-23">
						<a href="signUp.php" class="txt1">
							Don't have an account, create first :)
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="LogIn/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="LogIn/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="LogIn/vendor/bootstrap/js/popper.js"></script>
	<script src="LogIn/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="LogIn/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="LogIn/vendor/daterangepicker/moment.min.js"></script>
	<script src="LogIn/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="LogIn/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="LogIn/js/main.js"></script>

</body>
</html>

<?php
