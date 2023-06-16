<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'dependancies.php' ?>
    <title>update record</title>
</head>

<body>
    <form action="" method="post" name="form">
        
        <?php
        include 'connection.php';
        if (!($_GET['id'])) {
            header('location:create.php');
        }
        else{
            $ids = $_GET['id'];
        $readquery = "SELECT * FROM `data_table` WHERE id=$ids";
        $result = mysqli_query($con, $readquery);
        $arr = mysqli_fetch_array($result);
        ?>
        <label for="username">Enter your username</label><br>
        <input type="text" name="username" value="<?php echo $arr['Username']; ?>"><br>
        <label for="mail">Enter your email address</label><br>
        <input type="email" name="mail"  value="<?php echo $arr['email']; ?>"><br>
        <label for="ph">Enter your phone</label><br>
        <input type="tel" name="ph" value="<?php echo $arr['phone']; ?>"><br>
        <label for="pw">Enter your password</label><br>
        <input type="password" name="pw" value="<?php echo $arr['password']; ?>"><br>
        <button type="submit" name="submit">Submit form</button>
        <?php
            if (isset($_POST['submit'])) {
                $uname = $_POST['username'];
                $email = $_POST['mail'];
                $phone = $_POST['ph'];
                $pass = $_POST['pw'];
                $updatequery = "UPDATE `data_table` SET `Username`='$uname',`email`='$email',`phone`='$phone',`password`='$pass' WHERE id=$ids";

                mysqli_query($con, $updatequery);
                header('location:read.php');

            }
             
        }
               
        ?>
    </form>
    
    
</body>

</html>