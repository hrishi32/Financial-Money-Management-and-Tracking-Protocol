<?php  
		include('config.php');
		$reqId=$_GET['id'];
		$sql="UPDATE `Request` SET `approved` = '1' WHERE `Request`.`reqId` = '$reqId'  ";
		// echo $sql;
		$result = mysqli_query($db,$sql);
		// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($result)
		{
			
			header('location:requestsforme.php');
		}
		else
			echo "not approved";
  ?>