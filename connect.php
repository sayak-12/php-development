<?php

$user = "root";
$password = "";
$server = "localhost";
$db = "testdata";

$conn= mysqli_connect($server, $user, $password, $db);
if ($conn) {
    ?>
    <script>
        alert("connection successful");
    </script>
<?php
}
else{
    die("connection not sucessful, error : ". mysqli_connect_error());
}
?>
