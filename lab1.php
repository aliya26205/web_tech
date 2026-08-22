<?php
$name=$_POST['name'];
$add=$_POST['add'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$prof=$_POST['prof'];
$reside=$_POST['reside'];
if (empty($name)) {
	die("ERROR!! ADD NAME");
}
if (empty($add)) {
	die("ERROR!! ADD add");
}
if (empty($gender)) {
	die("ERROR!! ADD gender");
}
if (empty($age)) {
	die("ERROR!! ADD age");
}
elseif ($age<18||$age>60) {
	die("ERROR!! not possible");
}
if (empty($prof)) {
	die("ERROR!! add prof");
}
if (empty($reside)) {
	die("ERROR!! add reside");
}
if (strcmp($reside, "no")==0) {
	die("ERROR!! cant should have resident");
}
else
{
	echo("<h1>Welcome</h1>");
	echo("Name:$name<br>");
	echo("add:$add<br>");
	echo("age:$age<br>");
	echo("Gender:$gender");
	echo("prof:$prof<br>");
	echo("resident:$reside<br>");
	echo("<h2>Registerd</h2>");
}
?>