
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
            <form class="login100-form validate-form" action="signUpProcessing.php" method="post">
					<span class="login100-form-title p-b-43">
						Student Registration
					</span>

                <div class="wrap-input100 rs1 validate-input" data-validate = "Student's name is required">
                    <input class="input100" type="text" name="name">
                    <span class="label-input100">Student's Name</span>
                </div>

                <div class="wrap-input100 rs2 validate-input" data-validate = "Student's number is required">
                    <input class="input100" type="text" name="number">
                    <span class="label-input100">Student's Number</span>
                </div>

                <div class="wrap-input100  validate-input" data-validate = "Student's mail is required">
                    <input class="input100" type="text" name="mail">
                    <span class="label-input100">Student's Mail</span>
                </div>

                <div class="wrap-input100  validate-input" data-validate = "Student's nId is required">
                    <input class="input100" type="text" name="nId">
                    <span class="label-input100">Student's NId</span>
                </div>

                <div class="wrap-input100  validate-input" data-validate = "Gurdian's name is required">
                    <input class="input100" type="text" name="gName">
                    <span class="label-input100">Gurdian's Name</span>
                </div>

                <div class="wrap-input100  validate-input" data-validate = "Gurdian's number is required">
                    <input class="input100" type="text" name="gNumber">
                    <span class="label-input100">Gurdian Number</span>
                </div>


                <div class="wrap-input100  validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass">
                    <span class="label-input100">Password</span>
                </div>
                <div class="wrap-input100  validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="conPass">
                    <span class="label-input100">Confirm Password</span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Sign Up
                    </button>
                </div>

                <div class="text-center w-full p-t-23">
                    <a href="logIn.php" class="txt1">
                        Have an account, Log In :)
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

