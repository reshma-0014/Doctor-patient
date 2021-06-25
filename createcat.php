<?php
   include('db_config/session.php');

// initializing variables
   $branchname = "";
   $amount    = "";
   $errors = array(); 

   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
// REGISTER USER

  // receive all input values from the form
       $branchname = mysqli_real_escape_string($db, $_POST['branchname']);
       $amount = mysqli_real_escape_string($db, $_POST['amount']);

        

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
       $user_check_query = "SELECT * FROM branch WHERE branchname='$branchname'";
       $result = mysqli_query($db, $user_check_query);
       $user = mysqli_fetch_assoc($result);
  
       if ($user) { // if user exists
        if ($user['branchname'] === $branchname) {
           array_push($errors, "Branchname already exists");
        }

      }
      if (count($errors) == 0) {
         $query = "INSERT INTO branch (branchname, amount) 
  			         VALUES('$branchname', '$amount')";
  	      mysqli_query($db, $query);
  	      echo "Succesfully registered ";
  	      header('location: createstaff.php');
         }

    }
?>

<html>
   <head>
   <title>
    Create New Branch
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/createcat.css">
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
                            <header>Create New Branch</header>
                            <div class="form-group">
                                <i class="fas fa-users"></i>
                                <input class="myInput" type="text" placeholder="Branch Name" name="branchname" required> 
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-info"></i>
                                <input class="myInput" placeholder="Amount per Patient" type="text" name="amount" required> 
                            </div>
                            
                            <input type="submit" class="butt" value="Create">
                            
                        </form>
        </div>
     </div>
     
     
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
   
   </body>
   
</html>
