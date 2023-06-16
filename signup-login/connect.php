<?php

$user = "root";
$password="";
$server = "localhost";
$db="signupdb";

$con = mysqli_connect($server, $user, $password, $db);
if ($con) {
    
}
else{
    die("conection not successful");
}

?>