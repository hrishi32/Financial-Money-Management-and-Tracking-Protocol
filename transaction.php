<?php
include('config.php');
	$transId=$_GET['id'];
	$sql="SELECT * FROM transactions Where transId='$transId' ";
		// echo $sql;
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($row)
	{
		$srcAcc=$row['sourceAcc'];
		$destAcc=$row['destAcc'];
		$amount=intval($row['amount']);
	}
	else 
		echo "\ncan't find transaction";

	$sql1= "SELECT * FROM Acc where accId ='$destAcc' ";
	$result1 = mysqli_query($db,$sql1);
	$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	if($row1)
	{
		$balanceDest=intval($row1['Balance']);
		$MoneyDest=intval($row1['moneyRecvd']);
	}
	else 
		echo "can't get destination account";

	
	$sql1= "SELECT * FROM Acc where accId ='$srcAcc' ";
	$result1 = mysqli_query($db,$sql1);
	$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	if($row1)
	{
		$balanceSrc=intval($row1['Balance']);
		$ExpenditureSrc=intval($row1['Expenditure']);
	}
	else 
		echo "can't get Source account";


	$MoneyDest=$MoneyDest+$amount;
	$balanceDest=$balanceDest+$amount;

	$balanceSrc=$balanceSrc-$amount;
	$ExpenditureSrc=$ExpenditureSrc+$amount;

	$sql="UPDATE `Acc` SET `moneyRecvd` = '$MoneyDest', `Balance` = '$balanceDest' WHERE `Acc`.`accId` = '$destAcc';";
		echo $sql;
	$result = mysqli_query($db,$sql);
	if($result)
		echo "good job";
	else
		echo "cant update transaction";



	$sql="UPDATE `Acc` SET `Expenditure` = '$ExpenditureSrc', `Balance` = '$balanceSrc' WHERE `Acc`.`accId` = '$srcAcc';";
		echo $sql;
	$result = mysqli_query($db,$sql);
	if($result)
	{	echo "good job twice";
header('location:audit.php');
}
	else
		echo "cant update transaction";
?>
