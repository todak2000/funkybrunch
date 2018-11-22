<!DOCTYPE html>
<html lang="en">
<head>
	<title>Funky Brunch Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
<?php
			require('auth/funkydb.php');
			session_start();
		    // If form submitted, insert values into the database.
		    if (isset($_REQUEST['submit'])){
				
				$email = stripslashes($_REQUEST['email']); // removes backslashes
				$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
				$password = stripslashes($_REQUEST['pass']);
				$password = mysqli_real_escape_string($con, $password);
				
			//Checking is user existing in the database or not
    
				$query ="SELECT * FROM `admin_login` WHERE admin_user='".$email."' and password='".md5($password)."' ";
			
                $result = mysqli_query($con,$query) or die(mysqli_error());

				$rows = mysqli_num_rows($result);
				// var_dump($rows);
		        if($rows==1){
					$_SESSION['email'] = $email;
						 header("Location: dashboard.php");// Redirect user to index.php
		            }else{
						echo "<div align='center' class='form' style='margin-top: 0;color:#ccc; width: 400px;position:fixed; top: 30%; left: 35%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9785;</span><br>Username/password is incorrect.</h3><br/>Click here to <a style='color:#979b1b;' href='index.php'>Login</a></div>";
						}
		    }else{
		?>
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/funky_brunch_logo-.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-59">
						Sign In
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" >
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" style="text-align: center; margin: auto;" name="submit">
								Sign In
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <?php } ?>
</body>

</html>