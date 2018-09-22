<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="style.css">

  
</head>

<body>
    		
    <div id="top_plane_div">
        <div id="logo_name" style="display:inline-block;"><h1>Money Trail</h1></div>
        <div id="login_button"><a href="helplogin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Log In</a></div>
    </div>
  
<div class="container">
  <form method="post" action="register.php">
    <div class="row">
      <h4  >Register Here</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Account Name" name="fullname" />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Choose a User Name" name="username" value= <?php echo $_SESSION['username'] ?> />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress" name="email" />
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="password" />
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Confirm Password" name="confirm_password" />
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>

    </div>
    <div class="row">
      <div class="col-half">
        <h4>School</h4>
        <div class="input-group">
          
            <input type="text" placeholder="School" name="school" />
          
          
        </div>
      </div>
      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="gender" value="male" id="gender-male" />
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
    </div>
    
    <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"  name="accept" />
        <label for="terms">I accept the terms and conditions for signing up to this account, and hereby confirm I have read the privacy policy.</label>
      </div>
    </div>
      <input type="submit" value="Sign Up"/ style="background-color:#cc3300; color: white; border-radius: 6px;">
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
