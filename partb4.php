<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SHOP</title>
</head>
<body>
<form method="POST" action="partb4.php">
	<table border="2">
	<tr>
		<td>Product name:</td>
		<td> <input type="text" name="pname"></td>
	</tr>	
	<tr>
		<td>Product id:</td>
		<td> <input type="text" name="pid"></td>
	</tr>
	<tr>
		<td>Product price:</td>
		<td> <input type="text" name="price"></td>
	</tr>
	<tr>
		<td>Product quantity:</td>
		<td> <input type="text" name="qty"></td>
	</tr>
	<tr>
		<td><input type="submit" name="add" value="add"> </td>
		<td> <input type="submit" name="view" value="view"></td>
	</tr>
	</table>
</form>
</body>
</html>
<?php
$con=new mysqli("localhost","root","","shop");
if ($con->connect_error) {
	die("Connection failed".$con->connection_error);
}
$sql="create table if not exists product(pname varchar(30),pid int(10),price int(50),qty int(50))";
if ($con->query($sql)===TRUE) {
	echo "table created";
}else{
	echo "Error",$con->error;
}
if (isset($_POST['add'])) {
	$pn=$_POST['pname'];
	$pi=$_POST['pid'];
	$pr=$_POST['price'];
	$qty=$_POST['qty'];
	$sql="insert into product values('$pn','$pi','$pr','$qty')";
	if ($con->query($sql)===TRUE) {
	echo "data inserted";
    }else{
	echo "Error",$con->error;
    }
}
if (isset($_POST['view'])) {
	$sql="select * from product";
	$result=$con->query($sql);
	if ($result->num_rows>0) {
		echo "<table border=1><tr><td>product name</td><td>product id</td><td>price</td><td>qty</td></tr>";
		while ($row=$result->fetch_assoc()) {
			echo "<tr><td>{$row['pname']}</td><td>{$row['pid']}</td><td>{$row['price']}</td><td>{$row['qty']}</td></tr>";
		}
		echo "</table>";
	}else{
		echo "no results!!";
	}
}
?>