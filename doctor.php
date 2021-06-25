<?php
   include('db_config/session.php');
?>   


<!doctype html>
<html lang="en">
   <head>
   <title>
   Doctor
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/doctor.css">
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
        <h7 style="color: blueviolet;font-size: 54px;font-weight:700;padding:5px;padding-top:30px;padding-left:40px;">
            Doctor List </h7>
          <?php
             $sql = "SELECT username,email,phnumber FROM doctorlogin";
             $result = mysqli_query($db, $sql); 
             echo "<br>";
             echo "<table class='styled-table'>";
             echo"<thead>";
             echo"<tr>";
             echo"<th>Name</th>";
             echo"<th>Email</th>";
             echo"<th>Contact No.</th>";
             echo"</tr>";
             echo"</thead>";
             echo"<tbody>";
             while ($row= mysqli_fetch_assoc($result)) { 
                 echo "<tr>";
                 foreach ($row as $field => $value) { 
                 echo "<td>" . $value . "</td>"; 
                 }
             echo "</tr>";
             }
             
            if (mysqli_num_rows($result) < 1)
               echo"<p class='h3'> NO Content available</p>";
             echo"</tbody>";
             echo "</table>";   
             
          ?>
        </div>
    </div>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
   
   </body>