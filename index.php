<!doctype html>
<html lang="en">
   <head>
   <title>
   Login
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
   <link rel="stylesheet" href="static/login.css">
   </head>
   
   <body>
     <div class="container">
       <div class="mycard">
          <div class="row"> 
             <div class="column1">
                 <div class="myLeftCtn">
                   <img class="myleftimage" src="assets/staff.svg">
                   <form action="stafflogin.php">
                     <input type="submit" class="butt" value="STAFF LOGIN">
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
