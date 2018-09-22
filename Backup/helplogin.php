<!DOCTYPE HTML>
  <html>
		<head>
			<link type="text/css" href="main.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<link rel="shortcut icon" href="favicon.ico" />

		</head>
		<body>
		<?php 
			include 'config.php';
			
	 ?>
			<div id="error_login">
				<h3 id="error_header" style="position:absolute; color:red;">Wrong Details Entered! Try Again</h3>
			</div>
			<div id="relogin_form">
			<div id="relogin">
				<form id="myform" method="post" action="dologin.php">
					<table>
						<tbody>
							<tr><input type="text" name="username" placeholder="username" class="login_form_inputs" required></tr><br>
							<tr><input type="password" name="given_password" placeholder="********" class="login_form_inputs" required></tr><br>
							<tr><input type="submit" value= "Log In" class="login_form_inputs" required></tr>
						</tbody>
					</table>
				</form>
				<div id="Forgot_password">
					<!-- <p id="messege" style="position:relative; left:70px;">Forgot Password? <a class="bottom_link">Click Here</a></p> -->
				</div>
			</div>
			</div>
		</body>
</html>
