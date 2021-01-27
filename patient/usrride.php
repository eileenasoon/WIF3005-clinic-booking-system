<?php 
session_start();
include "../dbconfig.php";
if (isset($_GET['function'])) {
  $idcancel = $_GET['ride_id'];

  $sql = "UPDATE ride SET status='2' WHERE ride_id=$idcancel";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Ride Cancelled successfully!");
    window.location.href="cancelride.php";</script>';
  } else {
    echo '<script>alert("Error while updating. Please try again!")</script>';
  }
  header("Location: cancelride.php"); 


  
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:1; url=../index.php"); 
}
?>
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
</head>
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


  <h3 class="text-center">All Rides</h3>
    
    <table style= "padding-left:20px" id="tbl" class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
    <thead>
            <th style="text-align:center">Ride Date ⇩</th>
            <th style="text-align:center">Pickup Point</th>
            <th style="text-align:center">Drop Point</th>
            <th style="text-align:center">Cab Type</th>
            <th style="text-align:center">Distance (KM)</th>
  
            <th style="text-align:center">Ride Fare (RM)</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Username</th>
            <th style="text-align:center">Cancel</th>
        </thead>
        <tbody>
        <?php
        $username_session = $_SESSION['username'];
        $sql = "SELECT * FROM ride where username = '$username_session'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <td style="text-align:center"><?php echo $row['ride_date']; ?></td>
                <td style="text-align:center"><?php echo $row['from_distance']; ?></td>
                <td style="text-align:center"><?php echo $row['to_distance']; ?></td>
                <td style="text-align:center"><?php echo $row['cab_type']; ?></td>
                <td style="text-align:center"><?php echo $row['total_distance']; ?></td>
                <td style="text-align:center"><?php echo $row['total_fare']; ?></td>
                <?php if ($row['status'] == 1) { $current_status = "Available"; } else { $current_status = "Cancel"; } ?>
                <td style="text-align:center"><?php echo $current_status; ?></td>
                <td style="text-align:center"><?php echo $row['username']; ?></td>
                <?php if ($row['status'] == 1) {  ?>
                  <td style="text-align:center; background-color:yellow" ><a href="usrride.php?function=cancel&ride_id=<?php echo $row['ride_id']; ?>" style="color:black">Cancel</a></td>
                <?php } else { ?>
                  <td style="text-align:center">N/A</td>
                <?php } ?>
                
              </tr>
            <?php
          }
        }
        $conn->close();

        ?>
        </tbody>
        </table>
        </center>
</div>

</body>
</html>