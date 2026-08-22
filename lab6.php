<?php
$name=$_POST['name'];
$fname=$_POST['fname'];
$gender=$_POST['gender'];
$img=$_POST['img'];
$dob=$_POST['dob'];
$today=date("y-m-d");
$age=date_diff(date_create($dob),date_create($today))->y;
if (empty($name)||empty($fname)||empty($gender)||empty($img)||empty($dob)) {
	die("Error!! Fill All the details");
}
if ($age<18) {
	die("Not eligible");
}
echo "<table border='1'>
<th colspan'2'>Election comission</th>
<tr><td colspan'2'><img src='$img'></td></tr>
<tr><td>Name:</td><td>$name</td></tr>
<tr><td>fathername:</td><td>$fname</td></tr>
<tr><td>gender:</td><td>$gender</td></tr>
<tr><td>dob:</td><td>$dob</td></tr>
<tr><td>age:</td><td>$age</td></tr>";
?>