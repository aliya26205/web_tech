<?php
$name=$_POST['name'];
$fname=$_POST['fname'];
$gender=$_POST['gender'];
$add=$_POST['add'];
$dob=$_POST['dob'];
$mob=$_POST['mob'];
$course=$_POST['course'];
$total=$_POST['total'];
$temp=1;
if (empty($name)||empty($fname)||empty($gender)||empty($add)||empty($dob)||empty($mob)||empty($course)||empty($total)) {
	$temp=0;
	die("Error!! Fill All the details");
}
if ($total<35) {
	$temp=0;
	die("Not eligible");
}
if ($total<80 && $course=="bca") {
	$temp=0;
	die("Not eligible");
}
if ($total<70 && $course=="bba") {
	$temp=0;
	die("Not eligible");
}
if ($total<60 && $course=="bcom") {
	$temp=0;
	die("Not eligible");
}
if ($total<40 && $course=="ba") {
	$temp=0;
	die("Not eligible");
}
if ($temp==1) {
	echo("Welcome!!");
	echo("name=$name");
}
?>