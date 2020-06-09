<?php session_start();
if(!isset($_SESSION["isLogged"])  || $_SESSION["isLogged"] != 1){
    header("location: logIn.php");
}
?>
