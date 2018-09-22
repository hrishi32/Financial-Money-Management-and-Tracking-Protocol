<?php  
		include('config.php');
		$reqId=$_GET['id'];
		$sqlQ="SELECT MAX(transId) as transId FROM transactions";
		// echo $sqlQ;
		$resultQ = mysqli_query($db,$sqlQ);
		$rowQ = mysqli_fetch_array($resultQ,MYSQLI_ASSOC);
		// echo $rowQ;
		$transId=intval($rowQ['transId']);
		$transId=$transId +1;


		$sqlQ="SELECT * FROM Request WHERE `Request`.`reqId` = '$reqId'  ";
		$resultQ = mysqli_query($db,$sqlQ);
		$rowQ = mysqli_fetch_array($resultQ,MYSQLI_ASSOC);
		$srcAcc=$rowQ['srcAcc'];
		$destAcc=$rowQ['destAcc'];
		$amount=$rowQ['amount'];

		$sql="UPDATE `Request` SET `audit` = '1', `transID`= '$transId' WHERE `Request`.`reqId` = '$reqId'  ";
		// echo $sql;
		$result = mysqli_query($db,$sql);
		// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($result&&$transId)
		{
			$sql="INSERT INTO `transactions` (`transId`, `sourceAcc`, `destAcc`, `sourceUser`, `amount`, `recieved`) VALUES (NULL, '$srcAcc', '$destAcc', '4', '$amount', '1')";	
			$result = mysqli_query($db,$sql);
			if($result)
				header('location:transaction.php?id='.$transId);
		}
		else
			echo "not approved";
  ?>