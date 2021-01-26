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
	
		<label style="font-size:20px;margin-left:10px;margin-right:5px"><b>Select Patient </b></label>
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
        $sql1 = "SELECT * FROM `book` WHERE `username`='$username'";
         $results1=$conn->query($sql1) or die( mysqli_error($conn));
         if(mysqli_num_rows($results1) != 0){
			require_once("../dbconfig.php");
?>			
				<form action="manageride.php" method="post">
				<table style="margin-top:30px;margin-left: auto;margin-right: auto;width:80%;float:center">
				<tr>
				<th style="text-align:center">DOV</th>
				<th style="text-align:center">Timestamp</th>
				<th style="text-align:center">Status</th>
				</tr>
<?php
			while($rs1 = mysqli_fetch_array($results1))
			{
				echo "<tr>";
                echo '<td>'.$rs1["DOV"].'</td>'
                .'<td>'.$rs1["Timestamp"].'</td>'
                .'<td><input type="text" style="border-width:0px;border:none;width:100%;text-align:center;font-size:19px" class="notcss" name="status[]" id="status" value="'.$rs1["Status"].'"></td></tr>' ;
	
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
