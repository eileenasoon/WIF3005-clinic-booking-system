<head>
<link rel="stylesheet" href="../main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "../dbconfig.php"; ?>
<style>
table{
    width: 100%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 1px;
	font-size: 17px;
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
    padding: 0px;
    text-align: center;
}
body,html { 	
	background-image:url(http://www.dreamtemplate.com/dreamcodes/bg_images/color/c4.jpg); 
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 150%;
}
</style>

<body>
	<div class="header">
		<ul>
			<li style="float:left;border-right:none;margin-bottom:5px"><a class="logo" href="mgrmenu.php"><img src="../images/cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
			<li  style="margin-top:7px;border-right:none"><a name="logout" href=../index.php>Logout</a></li>
		</ul>
	</div>
	<form action="mgrmenu.php" method="post">
	<div style="text-align:center">
		<h2 style ="color:white;text-align:center">Booking Status</h2>
	
		<label style="font-size:20px;margin-left:10px;margin-right:5px"><b>Select Doctor </b></label>
		<select name="doctor" id="doctor-list" class="demoInputBox" style="padding: 7px 3px 7px 10px;width:55%;height:35px;border-radius:6px">
		<?php
		session_start();
		$sql1="SELECT * FROM doctor";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["did"]; ?>"><?php echo "Dr. ".$rs["name"]." - ".$rs["region"]; ?></option>
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
		$did=$_POST['doctor'];
		$sql1 = "select * from book where DID= $did order by Timestamp ASC";
		 $results1=$conn->query($sql1); 
			require_once("../dbconfig.php");
			if(mysqli_num_rows($results1) != 0){
?>			
				<form action="mgrmenu.php" method="post">
				<table style="margin-top:30px;margin-left: auto;margin-right: auto;width:80%;float:center">
				<tr>
				<th style="text-align:center">Username</th>
				<th style="text-align:center">First Name</th>
				<th style="text-align:center">Appointment Date</th>
				<th style="text-align:center">Booking Date</th>
				<th style="text-align:center">Status</th>
				</tr>
<?php
			while($rs1=$results1->fetch_assoc())
			{
				$bookingdate = new DateTime($rs1['Timestamp']);
				$formattedbookingdate = date_format($bookingdate, 'd/m/Y');
				echo "<tr>";
					echo  '<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:15px" class="notcss" name="username[]" id="username" value="'.$rs1["Username"].'" readonly></td>'
					.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:15px" class="notcss" name="fname[]" id="fname" value="'.$rs1["Fname"].'" readonly></td>'
					.'<td><input type="date" style="border-width:0px;border:none;width:100%;text-align:right;font-size:15px" class="notcss" name="dov[]" id="dov" value="'.$rs1["DOV"].'" readonly></td>'
					.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:15px" class="notcss" name="timestamp[]" id="timestamp" value="'.$formattedbookingdate.'" readonly></td>'
					.'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:15px" class="notcss" name="status[]" id="status" value="'.$rs1["Status"].'"></td></tr>' ;
			}
?>		
			</table>	
			<button type="submit" style="margin-top:30px;position:center" name="submit2" value="Submit">Submit Changes</button></form>		
<?php
			}
			else{
				echo '<script>alert("The doctor has no appointment booking!")</script>';
			}
}
if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header( "Refresh:1; url=../index.php"); 
}
	require_once("../dbconfig.php");
	if(isset($_POST['submit2'])){
		$usrnm=$_POST["username"];
		$fnm=$_POST["fname"];
		$tmstmp=$_POST["timestamp"];
		$stts=$_POST["status"];
		$dt=$_POST["dov"];
		$n=count($usrnm);

	for($j=0;$j<$n;$j++){	
		$updatequery="update book set Status='$stts[$j]' where username='$usrnm[$j]' and timestamp='$tmstmp[$j]'";
		if (mysqli_query($conn, $updatequery)) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Status succesfully updated!')
			window.location.href='mgrmenu.php';
			</SCRIPT>");
		} 
		else{
			echo '<script>alert("Error while updating. Please try again!")</script>';
		}
	}
				
		}
?>
	
</body>
</html>
