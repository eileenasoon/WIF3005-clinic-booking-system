<html>
<head>
<?php
session_start();	
?>
<link rel="stylesheet" href="adminmain.css"> 
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
<title>Add Location</title>
</head>

<body style="background-image:url(../images/doctordesk.jpg); height: 100%; background-repeat: no-repeat;">
<div class="header">
    <ul>
        <li style="float:left;border-right:none;margin-bottom:5px"><a href="mainpage.php" class="logo"><img src="../images/cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
		<li class="dropdown" style="margin-top:13px">    
        <a href="javascript:void(0)" class="dropbtn">Doctor</a>
        <div class="dropdown-content">
            <a href="adddoctor.php">Add Doctor</a>
            <a href="deletedoctor.php">Delete Doctor</a>
            <a href="showdoctor.php">Show Doctor</a>
            <a href="showdoctorschedule.php">Show Doctor Schedule</a>
        </div>
    </li>
    <li class="dropdown" style="margin-top:13px">
    <a href="javascript:void(0)" class="dropbtn">Clinic</a>
    <div class="dropdown-content">
        <a href="addclinic.php">Add Clinic</a>
        <a href="deleteclinic.php">Delete Clinic</a>
        <a href="adddoctorclinic.php">Assign Doctor to Clinic</a>
        <a href="addmanagerclinic.php">Assign Manager to Clinic</a>
        <a href="deletedoctorclinic.php">Delete Doctor from Clinic</a>
        <a href="deletemanagerclinic.php">Delete Manager from Clinic</a>
        <a href="showclinic.php">Show Clinic</a>
    </div>
    </li>
    <li class="dropdown" style="margin-top:13px">
    <a href="javascript:void(0)" class="dropbtn">Manager</a>
    <div class="dropdown-content">
        <a href="addmanager.php">Add Manager</a>
        <a href="deletemanager.php">Delete Manager</a>
        <a href="showmanager.php">Show Manager</a>
    </div>
    </li>
    <li class="dropdown" style="margin-top:13px">
    <a href="javascript:void(0)" class="dropbtn">Location</a>
    <div class="dropdown-content">
        <a href="addlocation.php">Add Location</a>
        <a href="showlocation.php">Show All Location</a>
    </div>
    </li>
    <li class="dropdown" style="margin-top:13px">    
    <a href="javascript:void(0)" class="dropbtn">Ride</a>
    <div class="dropdown-content">
        <a href="manageride.php">Manage Ride</a>
    </div>
    </li>
    <li  style="float:right; border-right:none;margin-top:13px"><a name="logout" href=../index.php>Logout</a></li>
    </ul>
</div>

<div class="container">
<center>
  <h1>ADD LOCATION</h1><hr><br>
  <section>
  <form action="addlocation.php"  method="post">
  <div class="form-group  row feilds ">
  	<label style="color:black"><b>City: </b></label><br>
		<select name="city" required>
			<option selected disabled>Choose City</option>
			<option value="Johor">Johor</option>
			<option value="Kedah">Kedah</option>
			<option value="Kelantan">Kelantan</option>
			<option value="Malacca">Malacca</option>
			<option value="Negeri Sembilan">Negeri Sembilan</option>
			<option value="Pahang">Pahang</option>
			<option value="Penang">Penang</option>
			<option value="Perak">Perak</option>
			<option value="Perlis">Perlis</option>
			<option value="Sabah">Sabah</option>
			<option value="Sarawak">Sarawak</option>
			<option value="Selangor">Selangor</option>
			<option value="Terengganu">Terengganu</option>
			<option value="Kuala Lumpur">Kuala Lumpur</option>
			<option value="Labuan">Labuan</option>
			<option value="Putrajaya">Putrajaya</option>
		</select><br>
    <label for="location" >Location</label>
    <input type="text" pattern="^[a-zA-Z_]+( [a-zA-Z0-9_]+)*$" name="location" id="location" placeholder="Enter Location" required><br>
    </div>
    <div class="form-group  row feilds ">
    <label for="distance">Distance (KM)</label>
    <input type="number" name="distance" step=".01" id="distance" placeholder="Enter Distance in KM" required><br>
    </div>
    <div class="form-group  row feilds ">
    <label for="distance">Fare (MYR)</label>
    <input type="number" name="fare" step=".01" id="fare" placeholder="Enter Fare (All Fare is in MYR)" required><br>
    </div>
    <div class="form-group   feilds ">
    <label  for="available">Make Available</label><br><br>
    <label  for="yes">YES</label>
    <input class="" type="radio" name="available" id="available" value=1 required>
    <label  for="no">NO</label>
    <input class="" type="radio" name="available" id="available" value=0 required>
    </div><br>
    
    <div class="form-group ">
        <input type="submit" id="add" name="submit" value="Add Location">
    </div>
    </form>
  </section>
  </center>  
</div>

<?php

function alocation()
    { 
            include '../dbconfig.php';
            $city=$_POST['city'];
            $location = isset($_POST['location'])?$_POST['location']:'';
            $distance = isset($_POST['distance'])?$_POST['distance']:'';
            $fare = isset($_POST['fare'])?$_POST['fare']:'';
            $available = isset($_POST['available'])?$_POST['available']:'';

            $sql = "INSERT INTO location(`city`, `locationname`, `distance`, `total_fare`, `is_available`) VALUES('".$city."', '".$location."', '".$distance."', '".$fare."', '".$available."')";
            
            if (mysqli_query($conn, $sql)) 
		    {
                echo  '<script>alert("Location Added Successful")</script>';
            } 
            else
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }

if (isset($_POST['submit']))
{
    if(!empty($_POST['city'])&&!empty($_POST['location'])&&!empty($_POST['distance'])&&!empty($_POST['fare'])&&!empty($_POST['available'])){
				alocation();
		} else {
			echo '<script>alert("Please fill in all the columns!")</script>';
		}
    
  }

if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header( "Refresh:1; url=../index.php"); 
}
?>
</body>
</html>