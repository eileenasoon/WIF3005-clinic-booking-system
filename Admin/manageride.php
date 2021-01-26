<html>
<head>
<link rel="stylesheet" href="adminmain.css">
<style>
table{
    width: 100%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 1px;
	font-size: 19px;
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
    padding: 7px;
    text-align: center;
}
body,html{
	background-image:url(http://www.dreamtemplate.com/dreamcodes/bg_images/color/c4.jpg); 
	background-repeat: no-repeat; 
	background-attachment: fixed;
	background-size: cover;
	
}



</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "../dbconfig.php"; ?>
<!--<body style="background-image:url(../images/cancelback.jpg)"> -->

<body>
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
	

<form action="manageride.php" method="post">
	<div style="text-align:center">
		<h2 style ="color:white;text-align:center">Ride Status</h2>
	
		<label style="color:white;font-size:20px;margin-left:10px;margin-right:5px"><b>Select Patient </b></label>
		<select name="patient" class="demoInputBox" style="padding: 7px 3px 7px 10px;width:55%;height:35px;border-radius:6px">
		<?php
		session_start();
		$sql1="SELECT * FROM patient";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["username"]; ?>"><?php echo $rs["name"]; ?></option>
		<?php
		}
		?>
		</select>
		
			<button type="submit" style="border-radius:6px;padding:10px;margin-left:10px;width:10%" name="submit" value="Submit">Submit</button>
			</form>
<?php
if(isset($_POST['submit']))
{
		
		include '../dbconfig.php';
		$username=$_POST['patient'];
        $sql1 = "SELECT * FROM `ride` WHERE `username`='$username'";
         $results1=$conn->query($sql1) or die( mysqli_error($conn));
         if(mysqli_num_rows($results1) != 0){
			require_once("../dbconfig.php");
?>			
				<form action="manageride.php" method="post">
				<table style="margin-top:30px;margin-left: auto;margin-right: auto;width:80%;float:center">
				<tr>
				<th style="text-align:center">From</th>
				<th style="text-align:center">To</th>
				<th style="text-align:center">Cab Type</th>
				<th style="text-align:center">Total Distance</th>
				<th style="text-align:center">Total Fare</th>
				<th style="text-align:center">Status</th>
				</tr>
<?php
			while($rs1 = mysqli_fetch_array($results1))
			{
				if($rs1['status'] == 1){
					$status = 'Available';
				}
				else {
					$status = 'Not Available';
				}
				echo "<tr>";
				echo'<td hidden><input hidden type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="username[]" id="username" value="'.$rs1["username"].'" readonly></td>'
				.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="from_distance[]" id="from_distance" value="'.$rs1["from_distance"].'" readonly></td>'
				.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="to_distance[]" id="to_distance" value="'.$rs1["to_distance"].'" readonly></td>'
				.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="cab_type[]" id="cab_type" value="'.$rs1["cab_type"].'" readonly></td>'
				.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="total_distance[]" id="total_distance" value="'.$rs1["total_distance"].'" readonly></td>'
				.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="total_fare[]" id="total_fare" value="'.$rs1["total_fare"].'" readonly></td>'
				.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="status[]" id="status" value="'.$status.'"></td></tr>' ;
	
            }

?>		
			</table>	
			<button type="submit" style="margin-top:30px;position:center" name="submit2" value="Submit">Submit Changes</button></form>
<?php
        }
        else{
            echo '<script>alert("User has no appointment with ride booking!")</script>';
        }
}
if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header( "Refresh:1; url=../index.php"); 
}
	require_once("../dbconfig.php");
	if(isset($_POST['submit2'])){
		$status=$_POST["status"];
		$username=$_POST["username"];
		$n=count($status);

	for($j=0;$j<$n;$j++){
		if($status[$j] == 'Not Available' || $status[$j] == 'Cancel'){
			$status[$j] = 2;
		}
		elseif($status[$j] == 'Available' || $status[$j] == 'Confirmed'){
			$status[$j] = 1;
		}
		else{
			echo '<script>alert("Please enter a valid status!!")</script>';
			break;

	}
		$updatequery="UPDATE ride SET status= $status[$j] where username='$username[$j]'";
		if (mysqli_query($conn, $updatequery)) {
			echo '<script>alert("Status succesfully updated!!")</script>';
		} 
		else{
			echo '<script>alert("Error while updating. Please try again!")</script>';
		}
	

	}
				
		}
?>
	
</body>
</html>
