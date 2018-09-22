	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Audit</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="layout.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php 					include('config.php');

						session_start();
			     		if($_SESSION['loggedin'] == true){ /*echo $_SESSION['email'];*/ }
						 	else{ header('location:index.php'); } ?>
<body>
 <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1><a href="index.php" style="color: white">Money Trail</a></h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <!-- <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter">
                            <input type="submit" value="search" id="search_button"/>
                        </form> -->
                    </div>
                    <div id='login_slider'>
                            <div id="order_account">
                                <p><a href="myuploads.php">Your Account</a></p>
                                <p><a href="myorders.php">Your Orders</a></p>
                                <p><a href="to_post.php">Upload item</a></p>
                            </div>
                                <div id="login_button"><a href="logout.php">Log out</a></div>
                                <div id="new_user"><a href="registration.php">New User?</a></div>
                        </div>
                    <div id="login_signup" style="display:inline-block;">
                    <a href="checkout.php" style="display: inline-block;">
                        <div id="_button" style="display:inline-block;" class="signin" >
                            <span class=""></span>
                            <i class="fa fa-shopping-" aria-hidden="false"></i>
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;"      style="display: inline-block;" class="signin">
							<?php 
                                $userid=$_SESSION['userid'];
                                $accId=$_SESSION['accId'];
                                $accId=$_SESSION['accId'];
                      			$sql1="SELECT * FROM Acc where accId='$accId'  ";
                                // echo $sql1;
                                $result1=mysqli_query($db,$sql1);
                                $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC); 
                                $accountName= $row1['name'];
                                $Balance= $row1['Balance'];
                                $expenditure = $row1['Expenditure']; 
                                echo $accountName;
                            ?>      
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true" style="display: inline;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">

            </div>
            </div>
        </header>


<section>
            <div id="category_container">
                <ul id="category_list">
                    <li><div class="cat_divs" ><a href="myaccounts.php" > My Accounts</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('books')"><a href="mybills.php" > My bills</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('sports_accessories')"><a href="mytransactions.php"> My Transations</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('smartphones')" ><a href="request.php"> Request Money</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('food')"><a href="myrequests.php"> My Requests</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('electronics accessories')"><a href="requestforme.php"> Requests to me</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('bike')"><a href="bill_upload.php" > Add Bill</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('fashion')"><a href="audit.php"> Audit </a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('fashion')"><a href="logout.php"> Logout </a></div></li>
                    <!-- <li><div class="cat_divs"><a href=""> Services</a></div></li> -->
                </ul>
            </div>
        </section>

<script type="text/javascript">$(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });</script>




	

<br><br><br><br>

		<div class="container well" style="width: 60%">
	   <h1 style="text-align:center; font-weight:100; font-size:40px">Upload Bill</h1>

	   <form id = "bill_upload" action = "upload_bills.php" method="post" enctype="multipart/form-data">
	    <div class="form-group">
	      <label for="usr">Amount</label>
	      <input type="text" class="form-control" id="amount" name = "amount">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Reasons</label>
	      <input type="text" class="form-control" id="pwd" name = "remarks">
	    </div>


	    <div id="images_upload" class="form_divs" >
										  Upload   <input type="file" name="fileToUpload" id="fileToUpload" required>    
                  <input class= "btn btn-primary btn-lg" type="submit" value="Upload" id="submit_button" name="submitbtn" style="size:200px;margin-left: 500px;margin-right: 500px">
                    
                    
								</div>

		
		
	  </form>
	</div>	
				
</div>
</body>
</html>