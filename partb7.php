<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOTEL</title>
</head>
<body>
<?php
$con=new mysqli("localhost","root","","hotel");
if ($con->connect_error) {
	die("connection failed".$con->connection_error);
}
if (!isset($_POST['register'])) {
?>
<form action="partb7.php" method="POST">
	<table border="2" align="center">
		<tr>
			<th colspan="2">Ak bait</th>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><textarea name="address"></textarea></td>
		</tr>
		<tr>
			<td>contact:</td>
			<td><input type="text" name="contact"></td>
		</tr>
		<tr>
			<td>dob:</td>
			<td><input type="date" name="dob"></td>
		</tr>
		<tr>
			<td>check-in:</td>
			<td><input type="date" name="cin"></td>
		</tr>
		<tr>
			<td>check-out:</td>
			<td><input type="date" name="cout"></td>
		</tr>
		<tr>
			<td>no of rooms:</td>
			<td><input type="number" name="rooms"></td>
		</tr>
		<tr>
			<td>room type:</td>
			<td>
				<?php
				$stmt=$con->prepare("select * from room_r");
				$stmt->execute();
				$result=$stmt->get_result();
				if (!$result) {
					die("Error in execution".$con->error);
				}
				echo "<select name='rtype'>";
				while ($rows=$result->fetch_assoc()) {
					$rt=$rows['room_type'];
					?>
					<option value="<?php echo $rt; ?>"><?php echo $rt; ?></option>
				<?php }
				?>
				</select></td>
		</tr>
		<tr><td><input type="submit" name="register" value="book"></td>
			<td><input type="reset" name="reset">
	</table>
</form>
<?php
}else{
	$n=$_POST['name'];
	$ad=$_POST['address'];
	$ct=$_POST['contact'];
	$dob=$_POST['dob'];
	$cin=$_POST['cin'];
	$cout=$_POST['cout'];
	$rooms=$_POST['rooms'];
	$rtype=$_POST['rtype'];
	$days=(strtotime($cout)-strtotime($cin))/(60*60*24);
	$stmt=$con->prepare("select room_rent,room_count from room_r where room_type=?");
	$stmt->bind_param("s",$rtype);
	$stmt->execute();
	$result=$stmt->get_result();
	if (!$result) {
		die("Error in execution".$con->error);
	}
	$rows=$result->fetch_assoc();
	$rrent=$rows['room_rent'];
	$rcount=$rows['room_count'];
	if ($rcount<$rooms) {
		die("not sufficient rooms!!");
	}
	if ($cin>$cout) {
		die("invalid dates!!");
	}
	if ($cin<date('Y-m-d')) {
		die("invalid dates!!");
	}
	$amount=$days*$rrent;
	$stmt=$con->prepare("insert into cust values (?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssssss",$n,$ad,$ct,$dob,$cin,$cout,$rooms,$rtype);
	$stmt->execute();
	if (!$stmt) {
		die("Error in execution".$con->error);
	}
	$stmt=$con->prepare("update room_r set room_count=room_count-?");
	$stmt->bind_param("s",$rooms);
	$stmt->execute();
	if (!$stmt) {
		die("Error in execution".$con->error);
	}
	echo "room is booked for $days days";
	echo "pay $amount at counter";
}
?>
</body>
</html>