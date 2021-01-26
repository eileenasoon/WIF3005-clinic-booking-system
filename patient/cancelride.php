<html>
<head>
<link rel="stylesheet" href="../main.css">
<style>
table{
    width: 98%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
    font-size: 20px;
   
}

th{
border: 1px solid black;
	background-color: #333;
    color: white;
	text-align: left;
}
tr,td{
	border: 1px solid black;
	background-color: white;
    color: black;
}
body,html{
	background-image:url(http://www.dreamtemplate.com/dreamcodes/bg_images/color/c4.jpg); 
	background-repeat: no-repeat; 
	background-attachment: fixed;
	background-size: cover;
	
}
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 210px;
  position: fixed;
  z-index: 1;
  top: 50;
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

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
* {
  box-sizing: border-box;
}



</style>
<div class="sidenav">
  <a href="dashpatient.php">Dashboard</a>
  <a href="usrride.php">Rides</a>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "../dbconfig.php"; ?>
<!--<body style="background-image:url(../images/cancelback.jpg)"> -->
<title>All Rides</title>
<body>
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="ulogin.php" class="logo"><img src="../images/cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
					
					<li><a name ="logout" href=../index.php>Logout</a></li>
					<li><a href="viewpatientappointments.php">Show/Cancel Appointment</a></li>
                    <li><a href="dashpatient.php">Dashboard Ride</a></li>
					<li><a href="book.php">Book Now</a></li>
					<li><a href="ulogin.php">Home</a></li>
				</ul>
</div>


	

<div class="sucontainer" style="background-color:white; border: 2px solid black; border-radius: 5px; padding: 12px 20px; left:20%; right:20%; width:73%">
		<center>
<div id="allru">


  <h3 class="text-center">Cancelled Rides</h3>
    
  <table id="tbl3" class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
        <thead>
            <th onclick="sortTable(0,tbl3)">Ride Date ⇩</th>
            <th>Pickup Point</th>
            <th>Drop Point</th>
            
            <th onclick="sortTablen(4,tbl3)">Distance ⇩</th>
            
            <th onclick="sortTable(6,tbl3)">Ride Fare ⇩</th>
            <th>Status</th>
            <th>User id</th>
        </thead>
        <table>
        </center>
</div>

</body>
</html>