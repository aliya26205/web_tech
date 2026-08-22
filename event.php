<?php
class InputException extends Exception
{
	
	public function errorMessage()
	{
		$errorMsg='Error On line'.$this->getLine().'in'.$this->getFile()."<b>Error:".$this->getMessage()."</b>";
		return $errorMsg;
	}
}
class LogicalException extends Exception
{
	
	public function errorMessage()
	{
		$errorMsg='Error in line'.$this->getLine().'in'.$this->getFile()."<b>Error:".$this->getMessage()."</b>";
		return $errorMsg;
	}
}
class EmailException extends Exception
{
	
	public function errorMessage()
	{
		$errorMsg='Error in line'.$this->getLine().'in'.$this->getFile()."<b>Error:".$this->getMessage()."</b>";
		return $errorMsg;
	}
}
if (!isset($_POST['submit'])) {
?>
<form action="event.php" method="POST">
	<table border="2">
		<tr><td>Event name</td>
			<td><input type="text" name="ename"> </td>
		</tr>
		<tr><td>coordinator name</td>
			<td><input type="text" name="cname"> </td>
		</tr>
		<tr><td>Email address</td>
			<td><input type="text" name="em"> </td>
		</tr>
		<tr><td>Event budget</td>
			<td><input type="text" name="budget"> </td>
		</tr>
		<tr><td>Event expense</td>
			<td><input type="text" name="exp"> </td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"> </td>
		</tr>
	</table>
</form>
<?php
}else{
	$ename=$_POST['ename'];
	$cname=$_POST['cname'];
	$em=$_POST['em'];
	$bud=$_POST['budget'];
	$exp=$_POST['exp'];
	try
	{
		if (empty($ename)||empty($cname)||empty($em)||empty($bud)||empty($exp)) {
			throw new InputException("add all inputss");
			
		}
		if ($exp>$bud) {
			throw new LogicalException("cannot sanction the amt expens is more");
			
		}
		if (!filter_var($em,FILTER_VALIDATE_EMAIL)) {
			throw new EmailException("Add valid email!!");
			
		}
		echo "Amount is sanctioned collect bilo from office!!";
	}
	catch(InputException $e)
	{
		echo $e->errorMessage();
	}
	catch(LogicalException $e)
	{
		echo $e->errorMessage();
	}
	catch(EmailException $e)
	{
		echo $e->errorMessage();
	}
}
?>