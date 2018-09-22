<!DOCTYPE HTML>
<html>
		<head>
			<link type="text/css" href="main.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		</head>
		<body>
			<?php 
				include 'config.php';
		session_start();
			 $_SESSION['loggedin'] = false;
			 session_destroy();
			 header("location:index.php");
    ?>
			
			
	</body>
</html>