<?php
session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html>

<head>
  <?php include 'dependancies.php' ?>
  <title>Log in to your account</title>
</head>

<body>
  <?php
     $loginemail= ($_GET['inemail']) ? $_GET['inemail'] : "";
  ?>
  <div>
  </div>
  <div class="container">
    <h2>Log in Now</h2>
    <form action="" method="post">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo ($_SESSION['msg']) ? $_SESSION['msg'] : ""; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="form-group">
        <label for="Email1">Email address</label>
        <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          name="email" value="<?php echo $loginemail; ?>">
      </div>

      <div class="form-group">
        <label for="Password">Password</label>
        <input required type="password" class="form-control" id="exampleInputPassword" name="password">
      </div>
      <div class="form-group">

        <input type="checkbox" class="d-inline" id="exampleInputPassword" name="rmb">
        <label for="rmb">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary w-100" name="login">Log in</button>
    </form><br>
    <span>Don't have an account? <a href="signup.php" style="color: white; font-weight: bold;">Sign up here</a></span>
    <?php
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $loginquery = "SELECT * FROM `userdtls` WHERE email='$email'";
      $result = mysqli_query($con, $loginquery);
      $emailcount = mysqli_num_rows($result);

      if ($emailcount) {
        $db = mysqli_fetch_array($result);
        $dbpass = $db['password'];
        $_SESSION['firstname'] = $db['Full_name'];
        if (password_verify($password, $dbpass)) {
          ?>
          <script>
            alert("Login Successful");
          </script>
          <?php
          header('location:index.php');
        } else {
          ?>
          <script>
            alert("Invalid Password");
          </script>
          <?php
        }
      } else {
        ?>
        <script>
          alert("Invalid Email");
        </script>
        <?php
      }

    }

    ?>
  </div>
</body>

</html>