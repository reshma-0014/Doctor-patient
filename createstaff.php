<?php
   include('db_config/session.php');
    $username = "";
    $email    = "";
    $errors = array(); 

   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
  // REGISTER USER

  // receive all input values from the form
       $username = mysqli_real_escape_string($db, $_POST['username']);
       $email = mysqli_real_escape_string($db, $_POST['email']);
       $phnumber = mysqli_real_escape_string($db, $_POST['phnumber']);
       $branchn = mysqli_real_escape_string($db, $_POST['branchname']);
       $password_1 = mysqli_real_escape_string($db, $_POST['password']);
       $password_2 = mysqli_real_escape_string($db, $_POST['confirmpassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors,"Invalid email format");}
       if ($password_1 != $password_2) {
	   array_push($errors, "The two passwords do not match");
       }      

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
       $user_check_query = "SELECT * FROM stafflogin WHERE username='$username' OR email='$email' LIMIT 1";
       $result = mysqli_query($db, $user_check_query);
       $user = mysqli_fetch_assoc($result);
  
       if ($user) { // if user exists
        if ($user['username'] === $username) {
           array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
           array_push($errors, "email already exists");
        }
      }
      
      $branch_query = "SELECT * FROM branch WHERE id='$branchn'";
       $res = mysqli_query($db, $branch_query);
       $row = mysqli_fetch_assoc($res);
       
       $branchname=$row['branchname'];

  // Finally, register user if there are no errors in the form
       if (count($errors) == 0) {

  	      $query = "INSERT INTO stafflogin (username, email, phnumber, branchname, password) 
  			         VALUES('$username', '$email', '$phnumber','$branchname', '$password_1')";
  	      mysqli_query($db, $query);
  	      echo "Succesfully registered ";
  	      header('location: admindash.php');
         }
        
    } 

?>

<html>
   <head>
   <title>
    Create New Staff
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/createstaff.css">
   </head>
   <body>
   
   
   <header>
         <nav class="navbar navbar-expand-lg navigation-wrap">
         <div class="container">
       <div class="navbar">
        <div class="welcome">
         <h1 style="color:white;font-weight: 800;">
          Welcome, <?php echo $user_check; ?>! 
         </h1>
        </div>
        <div class="logout">
          <form action="logout.php">
             <input type="submit" class="butt" value="LOGOUT">
          </form>
        </div>
      </div> 
      </div>
    </nav>
     </header>
     
     <div class="container">
        <div class="mycard">
          <?php  if (count($errors) > 0) : ?>
              <div class="error">
  	           <?php foreach ($errors as $error) : ?>
  	               <p style="font-size: 24px;font-weight:600;padding:10px"> <?php echo $error ?></p>
  	            <?php endforeach ?>
               </div>
            <?php  endif ?>
           <form class="myForm text-center" style="padding-top:55px" action="" method="post">
                            <header>SignUp as Staff </header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" name="username" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" name="email" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-phone"></i>
                                <input class="myInput" placeholder="Phone Number" type="text" name="phnumber" required> 
                            </div>
                            
                            <div class="form-group">
                                <div class="select" style="width:230px;padding-left:365px;text-align: center;">
                                  <select name="branchname">
                                            <option value="">Select Branch</option>
                                      //populate value using php
                                       <?php

                                               $query="SELECT * FROM branch";
                                               $results = mysqli_query($db, $query);

                                                 foreach ($results as $row){
                                                 ?>
                                                  <option value="<?php echo $row["id"];?>"><?php echo $row["branchname"];?>
                                                  </option>       
                                                  <?php
                                                      }
                                        ?> 
                                   </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="password" placeholder="Password" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="confirmpassword" placeholder="ConfirmPassword" required> 
                            </div>
                            
                            <input type="submit" class="butt" value="SignUp">
                            
                        </form>
        </div>
     </div>
     
     
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
   </body>
   
</html>
