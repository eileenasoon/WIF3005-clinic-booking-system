<?php
session_start();
?>
<html>
<head>
<script src="jquerypart.js" type="text/javascript"></script>
<link rel="stylesheet" href="../Admin/adminmain.css"> 
<title>Assign Doctor to Clinic</title>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getclinic.php",
	data:'city='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorRegion(val) {
	$.ajax({
	type: "POST",
	url: "getdoctorregion.php",
	data:'city='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}

</script>
</head>
<body style="background-image:url(../images/doctordesk.jpg); height: 175%; background-repeat: no-repeat;">
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
<br>
<div class="container">
<center><h1>ASSIGN DOCTOR TO A CLINIC</h1><hr><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label style="font-size:20px" >City:</label>

		<select style="width:300px" name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);getDoctorRegion(this.value);">
		<option value="">Select City</option>
		<?php
		include '../dbconfig.php';
		$sql1="SELECT distinct City FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["City"]; ?>"><?php echo $rs["City"]; ?></option>
		<?php
		}
		?>
		</select><br>
        
	
		<label style="font-size:20px" >Clinic:</label>
		<select  style="width:300px" id="clinic-list" name="clinic"  >
		<option value="">Select Clinic</option>
		</select><br>
		
		<label style="font-size:20px" >Doctor:</label>
		<select style="width:300px" name="doctor" id="doctor-list">
		<option value="">Select Doctor</option>
		</select><br>
		
		<label style="font-size:20px" >
		Available Days<br>
		<table>
		<tr><td>Monday:</td><td><input type="checkbox" value="Monday" name="daylist[]"/></td></tr>
		<tr><td>Tuesday:</td><td><input type="checkbox" value="Tuesday" name="daylist[]"/></td></tr>
		<tr><td>Wednesday:</td><td><input type="checkbox" value="Wednesday" name="daylist[]"/></td></tr>
		<tr><td>Thursday:</td><td><input type="checkbox" value="Thursday" name="daylist[]"/></td></tr>
		<tr><td>Friday:</td><td><input type="checkbox" value="Friday" name="daylist[]"/></td></tr>
		<tr><td>Saturday:</td><td><input type="checkbox" value="Saturday" name="daylist[]"/></td></tr>
		</table>
		<br>
		Availability(24 hour Format):<br>
		From:<input style="width:300px" type="time" name="starttime"><br>
		To:<input style="width:300px" type="time" name="endtime"> &nbsp &nbsp &nbsp
		
		</label>
		<button name="Submit" type="submit">Submit</button>
	</form>
	</div>
<?php
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=../index.php"); 
}

function newDoctorinClinic(){
		include '../dbconfig.php';
		$cid=$_POST['clinic'];
		$did=$_POST['doctor'];
		$starttime=$_POST['starttime'];
		$endtime=$_POST['endtime'];
		
		foreach($_POST['daylist'] as $daylist)
		{
				$sql = "INSERT INTO doctor_availability (CID, DID, Day, Starttime, Endtime) VALUES ('$cid','$did','$daylist','$starttime','$endtime')";
				if (mysqli_query($conn, $sql)) 
				{
					echo '<script>alert("Record created successfully, added the doctor to the clinic.")</script>';
				} 
				else
				{
					$result = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		}
	}

	if(isset($_POST['Submit']))
	{
		if(!empty($_POST['city'])&&!empty($_POST['clinic'])&&!empty($_POST['doctor'])&&!empty($_POST['starttime'])&&!empty($_POST['endtime'])&&!empty($_POST['daylist'])){
				newDoctorinClinic();
		} else {
			echo '<script>alert("Please fill in all the columns!")</script>';
		}
	}

?>

</body>
</html>