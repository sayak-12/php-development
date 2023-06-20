<?php

$user = "root";
$password="";
$server = "localhost";
$db="usersdatabase";

$con = mysqli_connect($server, $user, $password, $db);
if ($con) {
    
}
else{
    die("conection not successful");
}

?>