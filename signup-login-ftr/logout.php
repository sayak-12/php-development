<?php
include 'connect.php';
session_start();
session_destroy();
?>
<script>
    alert("Logged out successfully");
    location.replace("login.php");
</script>
<?php


?>