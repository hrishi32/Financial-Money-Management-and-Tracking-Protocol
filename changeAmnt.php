<?php
include 'config.php';

$reqId=$_POST['reqId'];
$amount=$_POST['amount'];

echo $reqId;
echo $amount;

// echo $reqId;
// echo $amount;

$sql1= "UPDATE `Request` SET `amount` = '$amount', `audit` = '1' WHERE `Request`.`reqId` = $reqId  ";
	$result = mysqli_query($db,$sql1);
	
	if($result)
	{
		header('location:audit.php');
	}
	else 
		echo "can't get destination account";

?>