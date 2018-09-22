<!DOCTYPE HTML>
<html>
<head>
	<link type="text/css" href="main1.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
	<?php 

		include 'config.php';
		session_start();

		function test_input($data) 
		{
	        $data = trim($data);
	    	$data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
	     }

        session_start();


		if(1)
		{
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
			    	if(isset($_POST['submitbtn']))
			    	{
				        //$destAcc = $_SESSION['accId'];
			    		$destAcc = $_SESSION['accId']; 

				        $audit = 0;
				        
				        $transId = 0;

			        	$auditor = $_POST['auditor'];

			        	$srcAcc= $_POST['srcId'];

			        	$amnt= $_POST['amount'];

			        	
				        $query = mysqli_query($db,"SELECT MAX(reqId) FROM Request");

			            $prev_req_id = mysqli_fetch_array($query);
			            
			            $current_req_id =  $prev_req_id[0]+1;

				    	$sql = "INSERT INTO Request (reqId,srcAcc,destAcc,amount,audit,transID,Auditor,approved) VALUES ('$current_req_id','$srcAcc','$destAcc','$amnt','0','0','$auditor','0')";
				    	//echo $sql;
				    	if(!mysqli_query($db,$sql))
				    	{	
				    		echo "ERROR: Could not update Request table.";
				            // header("location:bill_upload.php");
			                exit();    		
				    	}

			    	} 
			    	else 
			    	{ 
			    		echo "Invalid!";
			        	// header("location:bill_upload.php");
			        	exit();
			    	}
				}
		}  
		else
		{
		    header("location:request_form.php");
		    exit();
		}
        header("location:myrequest.php");
        exit();
	?>

</body>
</html>