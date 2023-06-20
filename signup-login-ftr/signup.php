<?php
session_start();
?>
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
            <div class="form-group mt-2">
                <label for="firstname">Full Name</label>
                <input required type="text" class="form-control" id="exampleInputfirstname" name="firstname">
            </div>
            <div class="form-group mt-2">
                <label for="username">Username</label>
                <input required type="text" class="form-control" id="exampleInputlastname" name="username">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email address</label>
                <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
            </div>
            <div class="form-group mt-2">
                <label for="phoneno">Phone Number</label>
                <input required type="text" class="form-control" id="exampleInputphoneno" name="phoneno">
            </div>

            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input required type="password" class="form-control" id="exampleInputPassword" name="password">
            </div>
            <div class="form-group mt-2">
                <label for="cPassword">Confirm Password</label>
                <input required type="password" class="form-control" id="cexampleInputPassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3" name="create">Sign up</button>
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
        $token = bin2hex(random_bytes(15));
        if (!($rows > 0)) {
            if (($password === $confirm)) {
                $qr2 = "INSERT INTO `userdtls`(`Full_name`, `Username`, `email`, `phone`, `password`,`token` ,`state`) VALUES ('$firstname','$username','$email','$phone','$hashed_pass','$token','inactive')";
                $iquery = mysqli_query($con, $qr2);
                $_SESSION['msg'] = "Registration successful, an email has been sent to activate your account.";
                // sending email
    

                ?>
                <script>
                    alert("successfully Signed up, please login");
                    Email.send({
                        SecureToken: "59dc9d11-b50d-4d3c-aceb-9a296209b1ff",
                        To: '<?php echo $email; ?>',
                        From: "sayakraha12@gmail.com",
                        Subject: "Email Verification Link",
                        Body: "<?php echo "Hi, Good day! Here is your email activation link: " . "http://localhost:3000/activate.php?token=$token"; ?>"
                    }).then(
                        message => alert(message)
                    );
                </script>

                <?php

            } else {
                ?>
                <script>
                    alert("Passwords not matching");
                </script>
                <?php
            }
        } else {
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