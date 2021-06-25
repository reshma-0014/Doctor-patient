<?php
   include('db_config/session.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
   $newpassword =  mysqli_real_escape_string($db,$_POST['newpassword']);
   $confirmnewpassword =  mysqli_real_escape_string($db,$_POST['confirmnewpassword']);
   $result = mysqli_query($db,"SELECT password FROM doctorlogin WHERE username='$user_check'");
   if($newpassword==$confirmnewpassword)
        $sql=mysqli_query($db,"UPDATE doctorlogin SET password='$newpassword' where username='$user_check'");
   if($sql)
        {
        echo "You have successfully changed your password!!";
        }
    else
        {
       echo "Passwords do not match";
       }
    }   
?>

<?php
      $query="SELECT DISTINCT date FROM patientinfo";
      $results = mysqli_query($db, $query);
      
      
      $dataPoints = array();
 
      $i=1;
      foreach ($results as $row){
      $date=$row['date'];
      $res = mysqli_query($db, "SELECT COUNT(date) AS count FROM patientinfo WHERE date='$date'");
      $ans = mysqli_fetch_assoc($res);
      array_push($dataPoints, array( "y" => $ans['count'], "label" => $date));
      
      }
?>  
<html>
   <head>
   <title>
    Doctor Dashboard
   </title>
   <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: " "
	},
	axisY: {
		title: "No. of Patients"
	},
	axisX: {
		title: "Date"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/doctordash.css">
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
          <div class="pass">
            <form class="myForm text-left" style="padding-top:55px;padding-left:40px" action="" method="post">
              <header>Change Current Password</header>
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="newpassword" placeholder="New Password" required> 
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" name="confirmnewpassword" placeholder="Confirm New Password" required> 
                            </div>


                            <input type="submit" class="butt" value="CHANGE PASSWORD">
             </form>
          </div>
          <div class="Patient">
             <header>Doctor's Graph</header>
                   
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          </div> 
          
        
        </div>
     </div>
     
   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
   
   </body>
   
</html>
