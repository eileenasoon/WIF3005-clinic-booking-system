<html>
<head>
<link rel="stylesheet" href="../main.css">
<title>Book Now</title>
<style>
body,html{
	background-image:url(../images/bookback.jpg);
	background-repeat: no-repeat; 
	background-attachment: fixed;
	background-size: cover;
}
</style>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "../dbconfig.php"; ?>
<script>
function getTown(val) {
	$.ajax({
	type: "POST",
	url: "../get_town.php",
	data:'countryid='+val,
	success: function(data){
		$("#town-list").html(data);
	}
	});
}
function getClinic(val) {
	$.ajax({
	type: "POST",
	url: "../getclinic.php",
	data:'townid='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorday(val) {
	$.ajax({
	type: "POST",
	url: "../getdoctordaybooking.php",
	data:'cid='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}

function getDay(val) {
	var cidval=document.getElementById("clinic-list").value;
	var didval=document.getElementById("doctor-list").value;
	$.ajax({
	type: "POST",
	url: "getDay.php",
	data:'date='+val+'&cidval='+cidval+'&didval='+didval,
	success: function(data){
		$("#datestatus").html(data);
	}
	});
}

</script>
<body>
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="ulogin.php" class="logo"><img src="../images/cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
			<li><a name ="logout" href=../index.php>Logout</a></li>
			<li><a href="viewpatientappointments.php">Show/Cancel Appointment</a></li>
			<li><a href="book.php">Book Now</a></li>
			<li><a href="ulogin.php">Home</a></li>
			
		</ul>
	</div>
	<form action="book.php" method="post">

	<!--<div class="sucontainer" style="background-image:url(images/bookback.jpg)"> -->
	<div class="sucontainer" style="background-color:white; border: 2px solid black; border-radius: 5px; padding: 12px 20px; left:25%; right:25%;">

	<h2 style="text-align: center">Book Appointment</h2>
		<hr><br>

		<label style="color:black"><b>Name</b></label><br>
		<input type="text" placeholder="Enter Full name of patient" name="fname" required><br><br>
		
		<label style="color:black" ><b>Gender</b></label><br><br>
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other<br><br>
	
		<label style="color:black"><b>City</b></label><br><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getTown(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select City</option><br><br>
		<?php
		$sql1="SELECT distinct(city) FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		<?php
		}
		?>
		</select>
        <br><br>
	
		<label style="color:black" ><b>Town</b></label><br><br>
		<select id="town-list" name="Town" onChange="getClinic(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Town</option><br>
		</select><br><br>
		
		<label style="color:black" ><b>Clinic</b></label><br><br>
		<select id="clinic-list" name="Clinic" onChange="getDoctorday(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Clinic</option>
		</select><br><br>
		
		<label style="color:black" ><b>Doctor</b></label><br><br>
		<select id="doctor-list" name="Doctor" onChange="getDate(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Doctor</option>
		</select><br><br>
		
		
		<label style="color:black" ><b>Date of Visit</b></label><br>
		<input type="date" name="dov" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required><br><br>
		<div id="datestatus"> </div>
		
		<div class="container">
			<button type="submit" style="float:right" name="submit" value="Submit">Submit</button>
		</div>
<?php
session_start();
if(isset($_POST['submit']))
{
		
		include '../dbconfig.php';
		$fname=$_POST['fname'];
		$gender=$_POST['gender'];
		$username=$_SESSION['username'];
		$cid=$_POST['Clinic'];
		$did=$_POST['Doctor'];
		$dov=$_POST['dov'];
		$status="Booking Registered.Wait for the update";
		$timestamp=date('Y-m-d H:i:s');
		$sql = "INSERT INTO book (Username,Fname,Gender,CID,DID,DOV,Timestamp,Status) VALUES ('$username','$fname','$gender','$cid','$did','$dov','$timestamp','$status') ";
		if(!empty($_POST['fname'])&&!empty($_POST['gender'])&&!empty($_SESSION['username'])&&!empty($_POST['Clinic'])&&!empty($_POST['Doctor']) && !empty($_POST['dov']))
		{
			$checkday = strtotime($dov);
			$compareday = date("l", $checkday);
			$flag=0;
			require_once("../dbconfig.php");
			$query ="SELECT * FROM doctor_availability WHERE DID = '" .$did. "' AND CID='".$cid."'";
			$results = $conn->query($query);
			while($rs=$results->fetch_assoc())
			{
				if($rs["day"]==$compareday)
				{
					$flag++;
					break;
				}
			}
			if($flag==0)
			{
				//echo "<h2>Select another date as Doctor Unavailable on ".$compareday."</h2>";
				echo '<script>alert("Select another date as Doctor Unavailable on '.$compareday.'");</script>';
			}
			else
			{
				if (mysqli_query($conn, $sql)) 
				{
						//echo "<h2>Booking successful!! Redirecting to home page....</h2>";
					//	header( "Refresh:2; url=ulogin.php");
					echo '<script>alert("Booking successful!! Redirecting to home page....");
					window.location.href="ulogin.php";</script>';

				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			echo '<script>alert("Please fill in all the columns!")</script>';
		}
		
}

if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:1; url=../index.php"); 
}
?>
	</form>
</body>
</html>