<!DOCTYPE html>
<html>
<head>
    <?php include 'dependancies.php' ?>
	<title>Log in to your account</title>
</head>
<body>
	<div>
	</div>
	<div class="container">
		<h2>Log in Now</h2>
	<form action="" method="post">
	
  <div class="form-group">
    <label for="Email1">Email address</label>
    <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  
  <div class="form-group">
    <label for="Password">Password</label>
    <input required type="password" class="form-control" id="exampleInputPassword" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100" name="create">Log in</button>
</form><br>
<span >Don't have an account? <a href="signup.php" style="color: white; font-weight: bold;">Sign up here</a></span>
</div>
</body>
</html>