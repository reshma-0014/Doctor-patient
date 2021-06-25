<?php
   include("db_config/config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM stafflogin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: staffdash.php");
      }else {

         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!doctype html>
<html lang="en">
   <head>
   <title>
   Staff Login
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/stafflogin.css">
   </head>
   
   <body>
     <div class="container">
       <div class="mycard">
          <div class="row"> 
             <div class="column1">
                 <div class="myLeftCtn">
                     <form class="myForm text-center" style="padding-top:45px" action="" method="post">
                            <header>Login As Staff</header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" name="username" required> 
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="password" placeholder="Password" required> 
                            </div>

                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="check_1"  type="checkbox" required><small> I read and agree to Terms & Conditions</small></input> 
                                    <div class="invalid-feedback">You must check the box.</div>
                                </label>
                            </div>

                            <input type="submit" class="butt" value="LOGIN">
                            
                        </form>
                 </div>
              </div>  
              <div class="column2"> 
                 <div class="myCenterCtn">
                     <div class="mycenterimage">
                        <h3 style="font-weight: 800;color:#fff;font-size: 60px;padding:60px;text-align: center;"> Are You an Admin ?</h3>
                      </div>
                    <form action="adminlogin.php">
                     <input type="submit" class="butt" value="ADMIN LOGIN">
                    </form> 
                 </div>
              </div>
              <div class="column3">
                 <div class="myRightCtn">
                   <div class="doctorimage">
                     <img class="myrightimage" src="assets/doctor.png">
                    </div>
                    <div class="quotes">
                    <div class="words">
                     <h4 class="font-italic" style="font-weight:1000px">Medicines cure<br> diseases,<br> but only doctors <br>can cure patients.</h4>
                     </div>           
                      <form action="doctorlogin.php">           
                      <input type="submit" class="butt" value="DOCTOR LOGIN" style="font-weight: 100px;">
                     </form>
                     </div>
                 </div>
              </div>                     
          </div>
       </div>
    </div> 
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
   
   </body>