<?php 
			    include 'config.php';
    
    			function test_input($data) {
  				      $data = trim($data);
  				      $data = stripslashes($data);
  				      $data = htmlspecialchars($data);
  				      return $data;
			    }

        $fullname = $username =  $email = $password = $confirm_password= $gender = $dob =""  ;
      
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  // echo "dataCreated sucesssfully0";
                    $fullname = test_input($_POST['fullname']);
                    $username = test_input($_POST['username']);
                    $email   = test_input($_POST['email']);
                    $password = test_input($_POST['password']);
                    $confirm_password = test_input($_POST['confirm_password']);
                    $gender  = test_input($_POST['gender']);
                    $school = test_input($_POST['school']);
        }
            
        $sql =  "SELECT * FROM user WHERE username = '$username';";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(is_null($row))
        {
          // echo "dataCreated sucesssfully1";
        // echo $fullname; echo $username ; echo $email ; echo $password; echo $confirm_password ; echo $gender;
           if(!strcmp($password , $confirm_password)){
                echo "dataCreated sucesssfully2";
                  $sql = "INSERT INTO user(`username`,`password`) VALUES('$username','$password')";
                  if($db->query($sql) == TRUE) 
                  {
                    // echo "dataCreated sucesssfully3";
                    $sql =  "SELECT userid FROM user WHERE username = '$username';";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $usrid = $row['userid'];
                    $sql = "INSERT INTO userdetails(`usrId`,`name`,`email`,`school`, `gender`) VALUES('$usrid','$fullname','$email', '$school', '$gender')";
                              if($db->query($sql) == TRUE) {
                                // echo "dataCreated sucesssfully4";
                                //header("location:index.php");
                                // session_destroy();
                                session_start();
                                $_SESSION['username'] = $username; 
                                $_SESSION['loggedin'] = true;
                                header("location:index.php");

                                exit();
                            } else {
                                        echo "Error creating table: " ;
                                        echo "Redirecting to registration page";
                                        sleep(2);
                                        // header("location:signup.php");
                                        // exit();
                            }}

           }   
         }//main if end
      
    ?>