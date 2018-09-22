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

		function test_input($data) 
		{
	        $data = trim($data);
	    	$data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
	     }

        session_start();




        $prev_bill_no = mysqli_query($db,"SELECT MAX(billId) FROM Bills");

		if(1)
		{
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
			    	if(isset($_POST['submitbtn']))
			    	{
				        //$acc_id = $_SESSION['accId'];
				        $acc_id = $_SESSION['accId'];
				        echo $acc_id;

			        	$amnt= $_POST['amount'];
			        	echo $amnt;
			        	$remarks = test_input($_POST["remarks"]);
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
		    // header("location:bill_upload.php");
		    exit();
		}

		if(isset($_POST['submitbtn'])&&isset($_FILES['fileToUpload']))
		{
    	    $name = $_FILES['fileToUpload']['tmp_name'];
	    
	        $tmp_name = $_FILES['fileToUpload']['tmp_name'];

            $query = mysqli_query($db, "SELECT MAX(BillId) FROM Bills");

            $prev_bill_id = mysqli_fetch_array($query);
            
            $current_bill_id =  $prev_bill_id[0]+1;

            echo $current_bill_id;

            $bill_name = $acc_id.$current_bill_id.".jpg";

		    $target_dir = 'uploads/';

            $check = getimagesize($_FILES["fileToUpload"]['tmp_name']);
            
            if($check !== false) 
            {
            	$target_dir = str_replace(' ','',$target_dir);
            	$bill_name = str_replace(' ','',$bill_name);
            	$final=$target_dir.$bill_name;
            	echo $final;
            	$target_file1 = $target_dir . $bill_name . "_1.jpg";
            	move_uploaded_file($tmp_name,$target_file1);
		    	
		    	$sql = "INSERT INTO Bills (BillId,amount,audited,location,accId,remarks) VALUES ('$current_bill_id','$amnt','0','$target_file1','$acc_id','$remarks')";

		    	if(!mysqli_query($db,$sql))
		    	{	
		    		echo "ERROR: Could not update Bills table.";
    	            // header("location:bill_upload.php");
	                exit();    		
		    	}
		    	else
		    		// echo "yo";
		    		header("location:mybills.php");
			}
            else 
            {
                echo "File is not an image.";
                // header("location:bill_upload.php");
                exit();
				            
            }
        }    	
	?>

</body>
</html>