<!DOCTYPE html>
<html>

<head>
    <?php include 'dependancies.php' ?>
    <title>Sign up to our website</title>
</head>

<body>
    <?php include 'connect.php'; ?>
    <div>
    </div>
    <div class="container">
        <h2>Sign Up Now</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="firstname">Full Name</label>
                <input required type="text" class="form-control" id="exampleInputfirstname" name="firstname">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input required type="text" class="form-control" id="exampleInputlastname" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
            </div>
            <div class="form-group">
                <label for="phoneno">Phone Number</label>
                <input required type="text" class="form-control" id="exampleInputphoneno" name="phoneno">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" id="exampleInputPassword" name="password">
            </div>
            <div class="form-group">
                <label for="cPassword">Confirm Password</label>
                <input required type="password" class="form-control" id="cexampleInputPassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="create">Sign up</button>
        </form><br>
        <span>Already have an account? <a href="login.php" style="color: white; font-weight: bold;">Log in
                here</a></span>
    </div>
    <?php

    if (isset($_POST['create'])) {
        $firstname = $_POST['firstname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phoneno'];
        $password = $_POST['password'];
        $confirm = $_POST['cpassword'];

        $check = "SELECT * FROM `userdtls` WHERE email = '$email'";
        $qr = mysqli_query($con, $check);
        $rows = mysqli_num_rows($qr);
        $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
        if (!($rows>0)) {
            if (($password === $confirm)) {
                $qr2 = "INSERT INTO `userdtls`(`Full_name`, `Username`, `email`, `phone`, `password`) VALUES ('$firstname','$username','$email','$phone','$hashed_pass')";
                $iquery = mysqli_query($con, $qr2);
                ?>
                <script>
                    alert("successfully inserted data");
                </script>

                <?php

            } else {
                ?>
                <script>
                    alert("Passwords not matching");
                </script>
                <?php
            }
        } 
        else {
            ?>
            <script>
                alert("Email already exists");
            </script>
            <?php
        }
    }

    ?>
</body>

</html>