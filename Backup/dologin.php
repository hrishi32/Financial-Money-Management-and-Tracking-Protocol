<!DOCTYPE HTML>
  	<html>
		<head>
			<link rel="shortcut icon" href="favicon.ico" />
		</head>
		<body>
		<?php 
		include 'config.php';
		
		$given_user_name = $given_password = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$given_user_name = testing_the_input($_POST["username"]);
			$given_password  = testing_the_input($_POST['given_password']);
					// header("location:index.php")
		}
			
		
		$sql = "SELECT * FROM user WHERE username = '$given_user_name' AND password = '$given_password' ";
		$result = $db->query($sql);
		echo $sql;

		if ($result->num_rows > 0) 
		{
    
			while($row = $result->fetch_assoc()) 
			{
				session_start();
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['username'] = $given_user_name;
				$_SESSION['level'] = $row['level'];
				$_SESSION['loggedin'] = true;
				header("location:./");
				// header('Content-Type: application/json');
				// echo json_encode($given_user_name);
				//header("location:index.php");
			
			}  
		}
		// else {
			// 	$sql = "INSERT INTO user (fullname, username, email, password, gender) VALUES ('jwefn', 'knlfds', 'ekerlnf@lerkngm.rfg', 'pass@iit', 'male')";
			// 	$result = $db->query($sql);
     		// header("location:helplogin.php");
			// }

		else
		{
			// header("location:helplogin.php");
			echo "Wrong credentials";
		}
			

			
			function testing_the_input($data) 
			{
  				$data = trim($data);
  				$data = stripslashes($data);
  				$data = htmlspecialchars($data);
  				return $data;
			}

							  


	
		?>
			
		</body>
</html>