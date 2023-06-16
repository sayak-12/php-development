<?php
include 'connect.php';
if(isset($_POST['submitbtn'])){
    $email = $_POST['email'];
    $passw =$_POST['passw'];
    echo("$email and $passw");
}
?>