<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>entrypage</title>
</head>
<body>
<?php
$con=new mysqli("localhost","root","","passport");
if ($con->connect_error) {
	die("Connection failed:".$con->connect_error);
}
if (!isset($_POST['save'])) {
?>
<form action="entry.php" method="POST">
	<table border="2">
		<tr><td>First Name:</td>
			<td><input type="text" name="fname"> </td></tr>
		<tr><td>Last Name:</td>
			<td><input type="text" name="lname"> </td></tr>
		<tr><td>DOB:</td>
			<td><input type="date" name="dob"> </td></tr>
		<tr><td>Image:</td>
			<td><input type="file" name="image"> </td></tr>
		<tr><td><input type="submit" name="save" value="save"> </td></tr>
	</table>
</form>
<?php
 }else{
 	$sql="create table if not exists passport(pass_id int,fname varchar(30),lname varchar(30),dob date,image varchar(100))";
 	$result=$con->query($sql);
 	if (!$result) {
 		die("Error in creating table".$con->connect_error);
 	}
 	$fn=$_POST['fname'];
 	$ln=$_POST['lname'];
 	$d=$_POST['dob'];
 	$im=$_POST['image'];
 	$sql="select max(pass_id) from passport";
 	$result=$con->query($sql);
 	if (!$result) {
 		die("Error in creating passid".$con->error);
 	}
 	if ($result->num_rows==0) {
 		$pass_id=1;
 	}else{
 		$row=$result->fetch_assoc();
 		$pass_id=$row['max(pass_id)']+1;
 	}
 	$sql="insert into passport values('$pass_id','$fn','$ln','$d','$im')";
 	$result=$con->query($sql);
 	echo "Your passport entry is done your passport id is:".$pass_id;
 }
?>
<h3><a href="passport.html">go back</a></h3>
</body>
</html>