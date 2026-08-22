<?php
$iname=$_POST['iname'];
$iprice=$_POST['iprice'];
if (empty($iname)||empty($iprice)) {
	die("Add all details!!");
}
$itema=explode(",", $iname);
$itemb=explode(",", $iprice);
$item_count=count($itema);
$iprice_count=count($itemb);
if ($item_count!=$iprice_count) {
	die("Should match!!");
}
echo "<table border='1'><th><td colspan='2'>ABC Copteration</td></th>
<tr><td>Item name:</td><td>Item price</td></tr>";
for ($i=0; $i < $item_count; $i++) { 
	echo "<tr><td>".$itema[$i]."</td><td>RS ".$itemb[$i]."</td></tr>";
}
echo("</table>");
$maxa=max($itemb);
$mina=min($itemb);
for ($i=0; $i <$item_count ; $i++) { 
	if ($maxa==$itemb[$i]) {
		echo"<br>expensive:".$itema[$i];
	}
	if ($mina==$itemb[$i]) {
		echo"<br>cheap:".$itema[$i];
	}
}
?>