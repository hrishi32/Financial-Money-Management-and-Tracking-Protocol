<!DOCTYPE HTML>
	<html>
		<head>
			<title>BSLS</title>
      <link type="text/css" href="main21.css" rel="stylesheet">
      <link type="text/css" href="main1.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

		</head>
		
		<body>
        <?php                   include('config.php');

                        session_start();
                        if($_SESSION['loggedin'] == true){ /*echo $_SESSION['email'];*/ }
                            else{ header('location:index.php'); }
                            $_SESSION['accId']=$_GET['id'];
                            $accId=$_SESSION['accId'];
                            $sql1="SELECT * FROM Acc where accId='$accId'  ";
                                    // echo $sql1;
                                    $result1=mysqli_query($db,$sql1);
                                    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC); 
                                    $accountName= $row1['name'];
                                    $Balance= $row1['Balance'];
                                    $expenditure = $row1['Expenditure']

                            ?>
			<!--button onclick="login();" id="show_lo[gin">Log In</button-->
        <header style="">
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1>BSLS</h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter" >
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
                        <div id="cart_button" style="display:inline-block;" class="signin">
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;" class="signin">
                            <span id="sign_in"><?php 
                                    
                                    echo $accountName;
                            ?></span>
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true"></i>
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
        
        <div id="body_container_of_selected_item" >
                  
                <div id="selected_image_show" style="display:inline-block;">
                    <img  id="image_main" src="<?php echo $image1;?>"/>
                </div>
            <div id="right_info_containing_div" style="display:inline-block" text-align:center
                overflow:auto;>
                <div id="product_title" style="padding:20px; padding-left:0px;">
                    <h1 style="margin:0px;"><?php ?></h1>
                </div>
                <div id="prices_offers" style="padding:20px; padding-left:0px;">
                    <p style="margin:0px; font-size:24px;">
                        <i style="margin-right:10px;"  aria-hidden="true"></i><?php  ?>
                        <?php echo $accountName ?>
                    </p>  
                </div>
                <div id="category" style="padding:20px; padding-left:0px;"><?php ?></div>
                <div id="owner_info" style="padding:20px; width:50%; border:solid red 1px;">
                    <span >Balance<pre style="display:inline;" >       </pre><?php echo $Balance ?></span><br>
                    <span>Expenditure<pre style="display:inline;" >      </pre><?php echo $expenditure ?></span><br>
                    <!-- <span>Location<pre style="display:inline;" >     </pre><?php echo $owner_add;?></span><br> -->
                   <a href=<?php echo "\"mybills.php?id=".$accId."\""; ?> >
                         <button type=button  >Bills</button> 
                   </a>
                   <a href=<?php echo "\"mybillstransctions.php?id=".$accId."\""; ?> >
                         <button type=button  >Transactions</button> 
                   </a>
                   <a href=<?php echo "\"myrequests.php?id=".$accId."\""; ?> >
                         <button type=button  >Requests</button> 
                   </a>
                    <div id="txtHint"><b><!-- Person info will be listed here... --></b></div>
                </div>
                <!-- <div id="pickup_location" style="padding:20px; padding-left:0px;"><span>Pickup Location - <?php echo $pickup_location; ?></span></div> -->
                <!-- <div id="specification" style="width:70%;"><h2 style="margin:0px;">Description</h2> <p><?php echo $description; ?></p></div> -->
                
                <div id="Additional_info"></div>
            </div>
        </div>


        <script>
             $(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });

        function add_cart(objid,usrid) {
            // window.location = "home.php" ;
                // document.getElementById("txtHint"+   objid).innerHTML = objid+" "+usrid;
                if (objid == 0) 
                {
                    document.getElementById("txtHint").innerHTML = " udfishfiuuhfiuhf";
                    return;
                } 
                else 
                { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } 
                    else 
                    {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("txtHint").innerHTML =this.responseText;
                        }
                    };
                    xmlhttp.open("GET","add_cart.php?userid="+usrid+"&objectid="+objid,true);
                    xmlhttp.send();
                }
            }
            function buy(objid,usrid)
            {
                add_cart(objid,usrid);
                window.location = "checkout.php"
            }
</script>

        
        <script type="text/javascript">
        function show_image2(){
            document.getElementById('image_main').src = "<?php echo $image2; ?>";
        }
        
        function show_image3(){
            document.getElementById('image_main').src = "<?php echo $image3; ?>";
        }
        function show_image4(){
            document.getElementById('image_main').src = "<?php echo $image4; ?>";
        }

        function hide_image(){
             document.getElementById('image_main').src = "<?php echo $image1; ?>";
        }
        </script>
      </body>
</html>
        
