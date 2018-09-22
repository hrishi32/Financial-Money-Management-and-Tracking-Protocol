	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>My Orders</title>
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
                <div id="logo_name" style="display:inline-block;"><h1><a href="index.php">BSLS</a></h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter">
                            <input type="submit" value="search" id="search_button"/>
                        </form>
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
                        <div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;"      style="display: inline-block;" class="signin">
							<?php 
                                    $userid=$_SESSION['userid'];
                                    // $emailsql="SELECT username FROM user WHERE email = '$email' ";
                                    // $emailresult=mysqli_query($db,$emailsql);
                                    // $emailrow = mysqli_fetch_array($emailresult,MYSQLI_ASSOC);
                                    // echo $emailrow['username'];
                            ?>                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true" style="display: inline;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="index.php">home</a></div></li>
                    <li><div class="nav_divs"><a href="sharing/index.php">Share</a></div></li>
                    <li><div class="nav_divs"><a href="auction/logout.php">Auction</a></div></li>
                    <!-- <li><div class="nav_divs"><a href="">Services</a></div></li> -->
                </ul>
            </div>
            </div>
        </header>
<!-- <div class="header">
	<div>
	<div id=search_bar>
		<table>
		<tr>
			<td><a href="checkout.php"><button>My Cart</button></a></td>
			<td><a href="home.php"><button>home</button></a></td>
			<td> tag:</td>
	       	<td>	<input type = "text" id="tag"  /></td>
	        <td> <button type=button onclick="search()" >GO</button></td>
	        </tr>
	    </table>    <input  type="submit" name="submit" value="GO" onclick="search()"> 
	</div>
	</div>
</div>
	 <div id="top_container">
					<table>
					<tbody>
						<tr>
							<td>
								<div id="selling">
				  				<a id="To_sell_item" href="to_post.php">Submit Item</a>
								</div>
							</td>
							<td>
								<div id="logout">
									<a href="logout.php">Log Out</a>						
								</div>
							</td>
						</tr>
					</tbody>
					</table>	
	<div id="main_container">
				Welcome : 
	</div>
</div> -->


<script type="text/javascript">$(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });</script>

<?php


// connect to the database
//searching starts from here

// $useremail= $_SESSION['email'];
// -- $sql="SELECT userid FROM user WHERE email = \"$useremail\"";
// $result = mysqli_query($db,$sql);
// if(!$result)
// {
// 	echo "kuch nahi mila matlab ki meh user ki userid nahi nikal paya";
// }
// 	$row = mysqli_fetch_array($result);
// 	$usrid= intval($row['userid']);
	

$sql="SELECT * FROM UserAccRel where userId='$userid'  ";
// echo $sql;
$result = mysqli_query($db,$sql);

// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// if(!$row)
// {
// 	echo "saari mehnat pani me";
// 	echo $sql;
// }
	$count = 0;
	$bill =0;
	echo "<div id=\"container_feed_items_in_search\">";
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	
				// $bill+= intval($row['price']);
				?>
						


				<div  class="item_divs_for_feed_in_search"  >
							<div class="liked_divs_feed">
								<i class="fa fa-heart-o" aria-hidden="true"></i>
							</div>
							<div class="imgcontainer">
					   			 <!-- <img src=<?php echo $row['image1_src'] ?> alt="Avatar" class="avatar"> -->
							</div>
<a href=<?php echo "\"account.php?id=".$row['accId']."\""; ?> >
							<div class="container">
								<ul>
								<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>
								<li><strong>Account number:</strong> <?php echo $row['accId']; $accId=$row['accId'] ?>
								</a>
								<li><strong>post:</strong> <?php echo $row['tag'] ?><br/>
								<?php $sql1="SELECT * FROM Acc where accId='$accId'  ";
									// echo $sql1;
									$result1=mysqli_query($db,$sql1);
									$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)
								?>
								<li><strong>name </strong> <?php echo $row1['name'] ?><br/>
								<li><strong>balance:</strong> <?php echo $row1['Balance'] ?><br/>
								<li><strong>level:</strong> <?php echo $row1['level'] ?><br/>
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