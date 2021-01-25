<html>
<head>
	<link rel="stylesheet" href="../main.css">
	<title>Home</title>
</head>
<body style ="background-image:url(http://www.dreamtemplate.com/dreamcodes/bg_images/color/c4.jpg);">
<div class="header">
				<ul>
				<li style="float:left;border-right:none"><a href="ulogin.php" class="logo"><img src="../images/cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
					
					<li><a name ="logout" type="submit" href=../index.php>Logout</a></li>
					
					<li><a href="viewpatientappointments.php">Show/Cancel Appointment</a></li>
					<li><a href="book.php">Book Now</a></li>
					<li><a href="ulogin.php">Home</a></li>
				</ul>
</div>
<form action="book.php" method="post">
	<!--<div class="sucontainer" style="background-image:url(images/bookback.jpg)"> -->
	<div class="sucontainer" style="background-color:white; border: 2px solid black; border-radius: 5px; padding: 12px 20px; left:25%; right:25%;">

	<h2 style="text-align: center">Book a Driver</h2>
		<hr><br>

		<label style="color:black"><b>Name</b></label><br>
		<input type="text" placeholder="Enter Full name of patient" name="fname" required><br><br>
	
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
    </form>
</html>