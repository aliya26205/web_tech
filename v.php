<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VIEW PASSPORT</title>
</head>
<body>
<?php
if (!isset($_POST['submit'])) {
?>
<form method="POST" action="v.php">
	<table border="2">
		<tr><td>Pass_id:</td>
			<td> <input type="text" name="pid"></td>
		</tr>
		<tr><td><input type="submit" name="submit"></td></tr>
	</table>
</form>
<?php
}else{
	$pid=$_POST['pid'];
	$con=new mysqli("localhost","root","","passport");
    if ($con->connect_error) {
	    die("Connection failed".$con->connection_error);
    }
    $sql="select * from passport where pass_id=$pid";
    $result=$con->query($sql);
    if (!$result) {
    	die("error in result".$con->error);
    }
    if ($result->num_rows==0) {
    	die("Passport does not exists");
    }else{
    	$row=$result->fetch_assoc();
    	echo "Your passport details are:";
    	echo "<table border=1>";
    	echo "<tr><td>Pass_id:</td><td>".$pid=$row['pass_id'];
    	echo "<tr><td>Name:</td><td>".$row['fname']." ".$row['lname'];
    	echo "<tr><td>Fathers name:</td><td>".$row['fathername'];
    	echo "<tr><td>DOB:</td><td>".$row['dob'];
    	echo "<tr><td>image:</td><td><img src=".$row['img'].">";
    	echo "</table>";

    }
}
?>
<h4><a href="pass.html">Go Back</a></h4>
</body>
</html>