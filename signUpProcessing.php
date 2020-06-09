<?php

function getField($field_name){
    if(!empty($_POST[$field_name])){
        return $_POST[$field_name];
    }else{
        return null;
    }

}

$name = getField("name");
$number = getField("number");
$email = getField("mail");
$gName = getField("gName");
$gNumber = getField("gNumber");
$pass = getField("pass");
$conPass = getField("conPass");
$nId = getField("nId");

$link = mysqli_connect("localhost", "root", "", "hostel_management");
$query = "insert into users(name, number, nid, gurdianName, gurdianNumber, mail, password) 
                values ('$name', '$number', '$nId', '$gName', '$gNumber', '$email', '$pass')";


if($conPass == $pass){
    mysqli_query($link, $query);
    header("location:  logIn.php");
}else{
    header("location: signUp.php");
}

?>