<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>viewpage</title>
</head>
<body>
<?php
if (!isset($_POST['view'])) {
?>
<form action="view.php" method="post"> 
	<label>Enter passport id:</label>
	<input type="text" name="pno">
	<input type="submit" name="view" value="view">
</form>
<?php
}else{
	$pid=$_POST['pno'];
	$con=new mysqli("localhost","root","","passport");
if ($con->connect_error) {
	die("Connection failed:".$con->connect_error);
   }
   $sql="select * from passport where pass_id=$pid";
   $result=$con->query($sql);
   if(!$result){
   	die("Cannot take passid".$con->error);
   }
   if ($result->num_rows==0) {
   	echo "no data";
   }else{
   	$row=$result->fetch_assoc();
   	echo "passport details:";
   	echo "<table border=1>";
   	echo"<tr><td>Passid:</td><td>".$pid=$row['pass_id']."</td></tr>";
   	echo"<tr><td>NAme:</td><td>".$row['fname']." ".$row['lname']."</td></tr>";
   	echo"<tr><td>DOB:</td><td>".$row['dob']."</td></tr>";
   	echo"<tr><td>img:</td><td>".$row['image']."</td></tr>";
	echo"</table>";
   }
}
?>
<h3><a href="passport.html">go back</a></h3>
</body>
</html>