<html>
<head>
	<link rel="stylesheet" href="../main.css">
	<title>Home</title>
	<?php include "../dbconfig.php"; ?>
</head>
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
<form action="bookDriver.php" method="post">
	<!--<div class="sucontainer" style="background-image:url(images/bookback.jpg)"> -->
	<div class="sucontainer" style="background-color:white; border: 2px solid black; border-radius: 5px; padding: 12px 20px; left:25%; right:25%;">

	<h2 style="text-align: center">Book a Ride</h2>
		<hr><br>

		<label style="color:black"><b>Pickup</b></label><br><br>
		<select name="pickup"  class="demoInputBox" id="pickup" style="width:100%;height:35px;border-radius:9px">
                  <option value="" >Current Location</option>
                  <?php
                  $sql = "SELECT * FROM location WHERE is_available=1";
				  $result = $conn->query($sql);
				  while($row = $result->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                  <?php } ?>
		</select>
		<br><br>

		<label style="color:black"><b>Drop</b></label><br><br>
		<select name="drop"  class="demoInputBox" id="drop" style="width:100%;height:35px;border-radius:9px">
                  <option value="" >Drop Location</option>
                  <?php
                  $sql = "SELECT * FROM location WHERE is_available=1";
				  $result = $conn->query($sql);
				  while($row = $result->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                  <?php } ?>
		</select>
		<br><br>

		<label style="color:black"><b>Car Type</b></label><br><br>
		<select name="cabtype"  class="demoInputBox" id="cabtype" style="width:100%;height:35px;border-radius:9px">
                  <option value="" >Car Type</option>
				  <option value="CedMicro">CedMicro</option>
				  <option value="CedMini">CedMini</option>
				  <option value="CedRoyal">CedRoyal</option>
				  <option value="CedSUV">CedSUV</option>
		</select>
		<br><br>
		
		
		<div class="container">
			<button type="submit" style="float:right" name="submit" value="Submit">Submit</button>
			<!-- <button type="button" style="float:right" id="button4" name="calculate" value="Calculate Fare">Calculate Fare</button> -->
		</div>

		<?php


		if(isset($_POST['submit']))
		{ 
			

			include('adminwrk.php');
			$pickup = $_POST['pickup'];
			$drop = $_POST['drop'];
			$cabtype = $_POST['cabtype'];
			$adm = new adminwrk();
			$admc = include "../dbconfig.php";
			$sql = "SELECT * FROM location WHERE is_available=1";
			$result = $conn->query($sql);
			$appr=array();
			while($row = $result->fetch_assoc()) {
				// array_push($appr, $row);
				$d1=0;
				$d2=0;
				
					if($row['name']==$pickup)
					{
						$d1=$row['distance'];
					}
					if($row['name']==$drop)
					{
						$d2=$row['distance'];
					}
				
			}
			$totaldist = abs($d1-$d2);
			$tdist = $totaldist;
			$fare=0;
			if($cabtype =='CedMicro'){
				if($totaldist<=5){
					$fare=1+(2.50*$totaldist);
				}
				elseif ($totaldist<=15) {
					$tdist= $tdist-5;
					$fare=3+(2*$tdist);
				}
				elseif ($totaldist<=25) {
					$tdist= $tdist-15;
					$fare=5+(1.80*$tdist);
				}
				elseif ($totaldist>25) {
					$tdist= $tdist-25;
					$fare=8+(1.50*$tdist);
				}
			}
			if($cabtype =='CedMini'){
				if($totaldist<=5){
					$fare=2.50+(3.30*$totaldist);
				}
				elseif ($totaldist<=15) {
					$tdist= $tdist-5;
					$fare=5+(3.10*$tdist);
				}
				elseif ($totaldist<=25) {
					$tdist= $tdist-15;
					$fare=8+(3*$tdist);
				}
				elseif ($totaldist>25) {
					$tdist= $tdist-25;
					$fare=12+(2.80*$tdist);
				}
			}
			if($cabtype =='CedRoyal'){
				if($totaldist<=5){
					$fare=3.50+(4.50*$dist);
				}
				elseif ($totaldist<=15) {
					$tdist= $tdist-5;
					$fare=6+(4.20*$tdist);
				}
				elseif ($totaldist<=25) {
					$tdist= $tdist-15;
					$fare=10+(4*$tdist);
				}
				elseif ($totaldist>25) {
					$tdist= $tdist-25;
					$fare=15+(3.70*$tdist);
				}
			}
			if($cabtype =='CedSUV'){
				if($totaldist<=5){
					$fare=3.80+(4.50*$dist);
				}
				elseif ($totaldist<=15) {
					$tdist= $tdist-5;
					$fare=6.50+(4.20*$tdist);
				}
				elseif ($totaldist<=25) {
					$tdist= $tdist-15;
					$fare=10+(4*$tdist);
				}
				elseif ($totaldist>25) {
					$tdist= $tdist-25;
					$fare=15+(3.70*$tdist);
				}
			}

			$result=array(
				'fare'=>$fare,'dist'=>$dist
			);
			echo json_encode($result) ;
			
			
			
			date_default_timezone_set('asia/kolkata');
			$datetime = date("Y-m-d h:i");
			$id = 10;

			echo $sql = "INSERT INTO ride(`ride_date`,`from_distance`,`to_distance`,`cab_type`,`total_distance`,`total_fare`,`status`,`username`) VALUES('".$datetime."','".$pickup."','".$drop."','".$cabtype."','".$totaldist."','".$fare."',1,'".$username."')";
			if (mysqli_query($conn, $sql)) 
			{ 
			echo '<script>alert("Booking successful!! Redirecting to appointment page...."); 
			  window.location.href="viewpatientappointments.php";</script>';

			 } 
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
				
		}
		
		?>

    </form>
</html>