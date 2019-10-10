    
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>My Bills</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet"  href="search.css"> -->
    <link rel="stylesheet"  href="main.css">
    <link rel="stylesheet" href="w3.css">
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<?php                   include('config.php');

                        session_start();
                        if($_SESSION['loggedin'] == true){ /*echo $_SESSION['email'];*/ }
                            else{ header('location:index.php'); }
                            $accId=$_SESSION['accId'];
                            $sql1="SELECT * FROM Acc where accId='$accId'  ";
                                    // echo $sql1;
                                    $result1=mysqli_query($db,$sql1);
                                    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC); 
                                    $accountName= $row1['name'];
                                    $Balance= $row1['Balance'];
                                    $expenditure = $row1['Expenditure'] ?>
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
                            $sql1="SELECT * FROM Acc where accId='$accId'  ";
                                    // echo $sql1;
                                    $result1=mysqli_query($db,$sql1);
                                    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC); 
                                    $accountName= $row1['name'];
                                    $Balance= $row1['Balance'];
                                    $expenditure = $row1['Expenditure']; 
                                    echo $accountName;
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
                
            </div>
            </div>
        </header>
<!-- <div class="header">
    <div>
    <div id=search_bar>
        <table>
        <tr>
            <td><a href="checkout.php"><button>My </button></a></td>
            <td><a href="home.php"><button>home</button></a></td>
            <td> tag:</td>
            <td>    <input type = "text" id="tag"  /></td>
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


// connect to the database
//searching starts from here

// $useremail= $_SESSION['email'];
// -- $sql="SELECT userid FROM user WHERE email = \"$useremail\"";
// $result = mysqli_query($db,$sql);
// if(!$result)
// {
//  echo "kuch nahi mila matlab ki meh user ki userid nahi nikal paya";
// }
//  $row = mysqli_fetch_array($result);
//  $usrid= intval($row['userid']);
    

$sql="SELECT * FROM Bills where accId = '$accId'  ";
// echo $sql;
$result = mysqli_query($db,$sql);
// echo $sql;
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// if(!$row)
// {
//  echo "saari mehnat pani me";
//  echo $sql;
// }
    $count = 0;
    $bill =0;
    echo "<div id=\"container_feed_items_in_search\">";
    while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {   
                // $bill+= intval($row['price']);
                ?>
                        


                <div  class="item_divs_for_feed_in_search"  >
                            
                            <div class="imgcontainer">
                                 <img src= <?php echo $row['location'] ?> alt="Avatar" class="avatar">
                            </div>
<!-- <a href=<?php echo "\"account.php?id=".$row['reqId']."\""; ?> > -->
                            <div class="container">
                                <ul>
                                <input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>
                                <li><strong>Bill ID</strong> <?php echo $row['billId'];  ?>
                                </a>
                                
                                <li><strong>AccountID </strong> <?php echo $row['accId'] ?><br/>
                                 <li><strong>Amount </strong> <?php echo $row['amount'] ?><br/>

                                    <a href=" <?php echo $row['location'] ?>" >
                                <li><strong>View Bill</strong><br/>
                                </a>
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