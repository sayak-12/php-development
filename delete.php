<?php

include 'connection.php';
$ids = $_GET['id'];
$delquery = "DELETE FROM `data_table` WHERE id=$ids";
$result = mysqli_query($con, $delquery);
if ($result) {
    ?>
        <script>
            alert("Deletion successful");
        </script>
    <?php
header('location:read.php');
}

?>