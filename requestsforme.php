	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Requests</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
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
                                    
                            ?>                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
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
            <div id="category_container"><pre style="display:inline; font-family:serif;">    Top Categories</pre>
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

<?php



	

$sql="SELECT * FROM Request where srcAcc = '$accId'  ";
// echo $sql;
$result = mysqli_query($db,$sql);

	$count = 0;
	$bill =0;
	echo "<div id=\"container_feed_items_in_search\">";
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	
				// $bill+= intval($row['price']);
				?>
						


				<div  class="item_divs_for_feed_in_search_req"  >
							<div class="imgcontainer">
					   			 <!-- <img src=<?php echo $row['image1_src'] ?> alt="Avatar" class="avatar"> -->
							</div>
<!-- <a href=<?php echo "\"account.php?id=".$row['reqId']."\""; ?> > -->
							<div class="container">
								<ul>
								<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>
								<li><strong>Destination acount</strong> <?php echo $row['destAcc']; $accId=$row['destAcc'] ?>
								</a>
								<li><strong>Request ID:</strong> <?php echo $row['reqId'] ?><br/>
								<li><strong>amount:</strong> <?php echo $row['amount'] ?><br/>
								
								<li><strong>Audit </strong> <?php echo $row['audit'] ?><br/>
								<li><strong>approved</strong> <?php echo $row['approved'] ?><br/>
									<?php
									// echo $row['approved'];
								if(!intval($row['approved']))
								{
									?>
									<a href=<?php echo "\"approve.php?id=".$row['reqId']."\""; ?> >
                         				<button type=button style="width: 80%"  >approve</button> 
                   					</a>
									<?php

								}
									?>

								<!-- <li><strong>level:</strong> <?php echo $row['level'] ?><br/> -->
								<div id="txtHint<?php echo $row['id']; ?>"><b><!-- Person info will be listed here... --></b></div>
								</ul>
							</div>
					</div>
			
				
	<?php  
			
		 //if (available end)
	}//while ends ?>
</div>
</body>
</html>