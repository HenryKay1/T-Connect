<?php
	session_regenerate_id(true);
	session_start();
	if(!isset($_SESSION["regState"])) $_SESSION["regState"] = 0;
	if(!isset($_SESSION["Authenticate"])) $_SESSION["Authenticate"] = 0;

?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Henry Lab3</title>
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/fonts/ionicons.min.css">
		<link rel="stylesheet" href="assets/css/Login_Reset_Form.css">
		<link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
		<link rel="stylesheet" href="assets/css/styles.css"> </head>

	<body>
		<?php
	if ($_SESSION["regState"] <= 0) {
	
?>
			<div class="login-clean">
				<form action="php/Login.php" method="post">
					<h2 class="sr-only">Login Form</h2>
					<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
					<div class="form-group">
						<input class="form-control" type="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block" type="submit">Log In</button>
					</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="color: rgb(163, 160, 160); font-size: 15px" href="php/Register.php">Register </a> | <a style="color: rgb(163, 160, 160); font-size: 15px" href="php/ResetPassword.php">Forgot Password</a>
					<p style="color: red;">
						<?php  
					echo $_SESSION["Message"];
					$_SESSION["Message"] = "";   
				?>
					</p>
				</form>
			</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.min.js"></script>
			<?php
} 
 if($_SESSION["regState"] == 1) {
?>
				<div class="register-photo">
					<div class="form-container">
						<div class="image-holder"></div>
						<form action="php/Register2.php" method="get">
							<h2 class="text-center"><strong>Create</strong> an account.</h2>
							<div class="form-group">
								<input class="form-control" type="text" name="FirstName" placeholder="First Name"> </div>
							<div class="form-group">
								<input class="form-control" type="text" name="LastName" placeholder="Last Name"> </div>
							<div class="form-group">
								<input class="form-control" type="email" name="Email" placeholder="Email"> </div>
							<div class="form-group">
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox">I agree to the license terms.</label>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
							</div> <a class="already" href="index.php">
					You already have an account? Login here.
					<?php  
					
						$_SESSION["regState"] = 0;   
					?>
				</a> </form>
					</div>
				</div>
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/bootstrap/js/bootstrap.min.js"></script>
				<?php
} 
?>
					<?php
 if($_SESSION["regState"] == 2) {
	 
?>
						<div class="ResetPassword">
							<form action="php/ResetPassword2.php" method="GET">
								<h2 class="sr-only">ResetPassword</h2>
								<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
								<h1 class="" style="font-size: 15px; text-align: center;">Please enter a registered email</h1>
								<div class="form-group">
									<input class="form-control" type="email" name="Email" placeholder="Email">
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Authenticate</button>
								</div>
								<p style="color: red;">
									<?php
										echo $_SESSION["Message"];
										$_SESSION["Message"] = "";
				
									?>
								</p>
							</form>
						</div>
						<script src="assets/js/jquery.min.js"></script>
						<script src="assets/bootstrap/js/bootstrap.min.js"></script>
						<?php
} 
?>
							<?php
 if($_SESSION["regState"] == 3) {
?>
								<div class="SetPassword">
									<form action="php/SetPassword.php" method="POST">
										<h2 class="sr-only">SetPassword</h2>
										<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
										<h1 class="" style="font-size: 15px; text-align: center; white-space: nowrap;">Enter New Password</h1>
										<div class="form-group">
											<input class="form-control" type="password" name="password1" placeholder="New Password">
										</div>
										<div class="form-group">
											<input class="form-control" type="password" name="password2" placeholder="Re-enter Password">
										</div>
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Set Password</button>
										</div>
										<p style="color: red;">
											<?php
				echo $_SESSION["Message"];
				$_SESSION["Message"] = "";
				?>
										</p>
								</div>
								<script src="assets/js/jquery.min.js"></script>
								<script src="assets/bootstrap/js/bootstrap.min.js"></script>
								<?php
} 
?>
									<?php
 if($_SESSION["regState"] == 5) {
?>
										<div style="text-align: left;" class="alert alert-success" role="alert"><span>Verification Link Sent</span></div>
										<div class="login-clean">
											<form>
												<h2 class="sr-only">Login Form</h2>
												<div class="illustration"><i class="icon ion-ios-navigate"></i></div> <span> A verification link was sent to <b style ="color : rgb(3, 156, 153);"><i><?php echo $_SESSION["Email"]; ?></i></b> &nbsp;</span>
												<!--	Why does span mess it up <button class="btn btn-primary btn-block" ><a href = "google.com" ><span >Gmail</span></a></button> --><a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-primary btn-block">Gmail</a> <a href="https://www.icloud.com/mail" class="btn btn-primary btn-block">icloud</a> <a href="https://login.yahoo.com/" class="btn btn-primary btn-block">Yahoo</a>
												<br>
												<div style="text-align:center;"> <a href="php/Register.php" style="color: rgb(163, 160, 160); font-size: 15px">Not your Email? Go back</a> </div>
											</form>
											<script src="assets/js/jquery.min.js"></script>
											<script src="assets/bootstrap/js/bootstrap.min.js"></script>
											<?php
} 
?>
	<?php
 if($_SESSION["regState"] == 6) {
?>
										<div style="text-align: left;" class="alert alert-success" role="alert"><span>Verification Link Sent</span></div>
										<div class="login-clean">
											<form>
												<h2 class="sr-only">Login Form</h2>
												<div class="illustration"><i class="icon ion-ios-navigate"></i></div> <span> A verification link was sent to <b style ="color : rgb(3, 156, 153);"><i><?php echo $_SESSION["Email"]; ?></i></b> &nbsp;</span>
												<!--	Why does span mess it up <button class="btn btn-primary btn-block" ><a href = "google.com" ><span >Gmail</span></a></button> --><a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-primary btn-block">Gmail</a> <a href="https://www.icloud.com/mail" class="btn btn-primary btn-block">icloud</a> <a href="https://login.yahoo.com/" class="btn btn-primary btn-block">Yahoo</a>
												<br>
												<div style="text-align:center;"> <a href="index.php" style="color: rgb(163, 160, 160); font-size: 15px">Not your Email? Go back
												<?php  
					
													$_SESSION["regState"] = 2;   
												?>
												
												</a> </div>
											</form>
											<script src="assets/js/jquery.min.js"></script>
											<script src="assets/bootstrap/js/bootstrap.min.js"></script>
											<?php
} 
?>
	</body>

	</html>