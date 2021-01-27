<html>
<head>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Dashboard Ride</title>
</head>
<style>


.sidenav {
  height: 100%;
  width: 210px;
  position: fixed;
  z-index: 1;
  top: 55;
  left: 0;
  background-color: #152B5B;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 15px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}



@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}




</style>
<body style ="background-image:url(http://www.dreamtemplate.com/dreamcodes/bg_images/color/c4.jpg);">
<div class="header">
				<ul>
				<li style="float:left;border-right:none"><a href="ulogin.php" class="logo"><img src="../images/cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
					
					<li><a name ="logout" type="submit" href=../index.php>Logout</a></li>
					
					<li><a href="viewpatientappointments.php">Show/Cancel Appointment</a></li>
                    <li><a href="dashpatient.php">Dashboard Ride</a></li>
					<li><a href="book.php">Book Now</a></li>
					<li><a href="ulogin.php">Home</a></li>
				</ul>
</div>

<div class="sidenav">
  <a href="dashpatient.php">Dashboard</a>
  
  <a href="usrride.php">Rides</a>

</div>


  
<div class="biggame-container">

        <div class="set1-container">
          <img
            class="game-icon"
            src="https://wprock.fr/wp-content/themes/wprock-theme/img/emoji/joypixels/512/1f697.png"
            alt=""
          />
          <br /><br>
          <a href="usrride.php">All Rides</a>
        </div>
        <div class="set2-container">
          <img
            class="game-icon"
            src="https://icon-library.com/images/cancel-icon-transparent/cancel-icon-transparent-28.jpg"
            alt=""
          />
          <br /><br>
          <a href="cancelride.php">Cancelled Rides</a>
        </div>
</div>
    
   

     

   
    


</body>
</html>