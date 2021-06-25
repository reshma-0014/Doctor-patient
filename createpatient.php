<?php
   include('db_config/session.php');



   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
// REGISTER USER

  // receive all input values from the form
       $username = mysqli_real_escape_string($db, $_POST['username']);
       $age= mysqli_real_escape_string($db, $_POST['age']);
       $phnumber = mysqli_real_escape_string($db, $_POST['phnumber']);
       $date = date("Y-m-d");
     

  	      $query = "INSERT INTO patientinfo (name, age, phnumber, date) 
  			         VALUES('$username', '$age', '$phnumber', '$date')";
  	      mysqli_query($db, $query);
  	      echo "Succesfully registered ";
  	      header('location: staffdash.php');

        
    }
?>
<html>
   <head>
   <title>
    Register Patient
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/createpatient.css">
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
           <form class="myForm text-center" style="padding-top:55px" action="" method="post">
                            <header>Patient Register</header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" name="username" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Age" type="text" name="age" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-phone"></i>
                                <input class="myInput" placeholder="Phone Number" type="text" name="phnumber" required> 
                            </div>
                            
                            <input type="submit" class="butt" value="Register">
                            
                        </form>
        </div>
     </div>
     
     
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
   
   </body>
   
</html>
