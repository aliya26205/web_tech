<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>shop</title>
</head>
<body>
	<form method="post" action="shop.php">
		<table border="2">
			<tr>
				<td>Product name:</td>
				<td><input type="text" name="pname"> </td>
			</tr>
			<tr>
				<td>Product id:</td>
				<td><input type="text" name="pid"> </td>
			</tr>
			<tr>
				<td>Product price:</td>
				<td><input type="text" name="price"> </td>
			</tr>
			<tr>
				<td>Product qty:</td>
				<td><input type="text" name="qty"> </td>
			</tr>
			<tr>
				<td><input type="submit" name="add" value="add"> </td>
				<td><input type="submit" name="view" value="view"> </td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
$con=new mysqli("localhost","root","","shop");
if ($con->connect_error) {
	die("Connection failed:".$con->connection_error);
}
echo "<br>";

$sql="create table if not exists product
      (pname varchar(30),pid int,price int,qty int)";
if ($con->query($sql)===TRUE) {
	echo "Table added ";
}else
{
	echo "ERROR:".$con->error;
}

if (isset($_POST['add'])) {
	$pn=$_POST['pname'];
	$pi=$_POST['pid'];
	$pr=$_POST['price'];
	$qt=$_POST['qty'];
	$sql2="insert into product (pname,pid,price,qty) values('$pn','$pi','$pr','$qt')";
	if ($con->query($sql2)===TRUE) {
	echo "Table added ";
   }else{
	echo "ERROR:".$con->error;
   }
}

if (isset($_POST['view'])) {
	$sql3="select * from product";
	$res=$con->query($sql3);
	if ($res->num_rows>0) {
		echo "<table border=2><tr><th>Pname</th><th>PID</th><th>Price</th><th>QTY</th></tr>";
		while ($row=$res->fetch_assoc()){
			echo("<tr><td>{$row['pname']}</td><td>{$row['pid']}</td><td>{$row['price']}</td><td>{$row['qty']}</td></tr>");
		}
		echo "</table>";

	}else{
		echo "No result";
	}
}
$con->close();
?>