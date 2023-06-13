<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'dependancies.php' ?>
    <title>connection sheet</title>
</head>

<body>
    <form action="" method="post" name="form">
        <label for="username">Enter your username</label><br>
        <input type="text" name="username"><br>
        <label for="mail">Enter your email address</label><br>
        <input type="email" name="mail"><br>
        <label for="ph">Enter your phone</label><br>
        <input type="tel" name="ph"><br>
        <label for="pw">Enter your password</label><br>
        <input type="password" name="pw"><br>
        <button type="submit" name="submit">Submit form</button>
        <?php
        include 'connection.php';
        if (isset($_POST['submit'])) {
            $uname = $_POST['username'];
            $email = $_POST['mail'];
            $phone = $_POST['ph'];
            $pass = $_POST['pw'];
            $conquery = "INSERT INTO `data_table`(`Username`, `email`, `phone`, `password`) VALUES ('$uname','$email','$phone','$pass')";
            mysqli_query($con, $conquery);
            header('location:read.php');

        }

        ?>
    </form>
</body>

</html>