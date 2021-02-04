<?php include 'includes/comprovation_login.php';

if(isset($_SESSION['username'])) header('Location: home.php');

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>IMAGINEST</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/imaginlogo.png"/>
		<!--===============================================================================================-->	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/utilogin.css">
		<link rel="stylesheet" type="text/css" href="assets/login.css">
		<!--===============================================================================================-->
	</head>
	<body>

		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/BG-login.jpg');">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					
						<span class="login100-form-title p-b-49">
							Login
						</span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
							
							<?php
								if(isset($_SESSION['success'])) 
								{
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
								elseif(isset($_SESSION['noLogin'])){
									echo $_SESSION['noLogin'];   
									unset($_SESSION['noLogin']);
								}
							?>
							
							<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
								<span class="label-input100">Username</span>
								<input class="input100" type="text" name="NameOrMail" placeholder="Type your username / email" required>
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<span class="label-input100">Password</span>
								<input class="input100" type="password" name="psswd" placeholder="Type your password" required>
								<span class="focus-input100" data-symbol="&#xf190;"></span>
							</div>

							<div class="text-right p-t-8 p-b-31">
								<a href="#">
									Forgot password?
								</a>
							</div>

							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button type="submit" class="login100-form-btn" name="login">Login</button>
								</div>
							</div>
						</form>

							<p class="text-center mt-4">Don’t have account yet? <a href="./register.php" class="txt2 text-decoration-none">Sign Up</a></p>
					
				</div>
			</div>
		</div>

	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>