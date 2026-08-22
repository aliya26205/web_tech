<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE PASSPORT</title>
</head>
<body>
<?php
$con=new mysqli("localhost","root","","passport");
if ($con->connect_error) {
	die("Connection failed".$con->connection_error);
}
if (!isset($_POST['submit'])) {
	?>
	<form method="POST" action="c.php">
		<table border="2">
			<tr>
			<th colspan="2">Passport</th>
		</tr>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="fname"></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="lname"></td>
		</tr>
		<tr>
			<td>Father Name:</td>
			<td><input type="text" name="fathername"></td>
		</tr>
		<tr>
			<td>DOB:</td>
			<td><input type="date" name="dob"></td>
		</tr>
		<tr>
			<td>Photo:</td>
			<td><input type="file" name="img"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
		</table>
	</form>
<?php
}else{
	$sql="create table if not exists passport(pass_id int(10),fname varchar(30),lname varchar(30),fathername varchar(30),dob date,img varchar(30))";
	$result=$con->query($sql);
	if(!$result)
	{
		die("Cannot create table".$con->error);
	}
	$fn=$_POST['fname'];
	$ln=$_POST['lname'];
	$fan=$_POST['fathername'];
	$dob=$_POST['dob'];
	$img=$_POST['img'];
	$sql="select max(pass_id) from passport";
	$result=$con->query($sql);
	if(!$result)
	{
		die("error in result".$con->error);
	}
	if ($result->num_rows==0) {
		$pass_id=1;
	}else{
		$row=$result->fetch_assoc();
		$pass_id=$row['max(pass_id)']+1;
	}
	$sql="insert into passport values($pass_id,'$fn','$ln','$fan','$dob','$img')";
	$result=$con->query($sql);
	if(!$result)
	{
		die("error in result".$con->error);
	}
	echo "<b>You have sucessfully created passport and your id is $pass_id";
}
?>
<h4><a href="pass.html">Go Back</a></h4>
</body>
</html>