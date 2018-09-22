<!DOCTYPE html>
<html lang="en">
<head>

	<title>File Upload</title>
	<meta charset="utf-8">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="layout.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div style="margin-top: 200px">
	<div class="container well" style="">
	   <h1 style="text-align:center; font-weight:100; font-size:40px">Request Form</h1>

	   <form id = "form_request" action = "request.php" method="post" enctype="multipart/form-data">
	    <div class="form-group">
	      <label for="usr">Account I.D. of Donor</label>
	      <input type="text" class="form-control" id="srcId" name = "srcId">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Amount</label>
	      <input type="text" class="form-control" id="pwd" name = "amount">
	    </div>
	    <div class="form-group">
	      <label for="auditor">Pick an Audit Section</label>
	      <select name="auditor">
	      	<option name="a1" value="1">TA/DA</option>
	      	<option name="a2" value="2">Medical Reimbursement</option>
	      	<option name="a3" value="3">Project Reimbursement</option>
	      	<option name="a4" value="5">General</option>
	      </select>
		<div>
	 		<input class= "btn btn-primary btn-lg" type="submit" value="Submit" id="submit_button" name="submitbtn" style="size:200px;margin-left: 500px;margin-right: 500px">
		</div>
		
	  </form>
	</div>	
	</div>

</body>
</html>
