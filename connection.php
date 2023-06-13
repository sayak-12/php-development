<?php

$user = "root";
$password="";
$server = "localhost";
$db="mydata";

$con = mysqli_connect($server, $user, $password, $db);
if ($con) {
    ?>
<script>
    alert("Connection Successful");
</script>
    <?php
}
else{
    die("conection not successful");
}

?>