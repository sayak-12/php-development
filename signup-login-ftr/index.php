<?php session_start(); 
if (!isset($_SESSION['firstname'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'dependancies.php'; ?>
    <title>Your Dashboard</title>
</head>
<body>
    <h1>
        Welcome to our site
    </h1>
    
    <h2>Greetings, <?php echo $_SESSION['firstname']; ?></h2>
    <a href="logout.php"><button type="button">Log Out</button></a>
</body>
</html>