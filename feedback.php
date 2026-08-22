<?php
$con=new mysqli("localhost","root","","feedback");
if ($con->connect_error) {
	die("Connection failed".$con->connection_error);
}
$name=$email=$subject=$message="";
$nameErr=$emailErr=$subjectErr=$messageErr="";
$sucessmessage="";
if ($_SERVER['REQUEST_METHOD']=="POST") {
	if (empty($_POST['name'])) {
		$nameErr="Name is required";
	}else{
		$name=test_input($_POST['name']);
	}
	if (empty($_POST['email'])) {
		$emailErr="Email is required";
	}else{
		$email=test_input($_POST['email']);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$emailErr="Email is required";
		}
	}
	if (empty($_POST['subject'])) {
		$subjectErr="subject is required";
	}else{
		$subject=test_input($_POST['subject']);
	}
	if (empty($_POST['message'])) {
		$messageErr="message is required";
	}else{
		$message=test_input($_POST['message']);
	}
	if (empty($nameErr)&&empty($emailErr)&&empty($subjectErr)&&empty($messageErr)) 
	{
		$stmt=$con->prepare("insert into feedback values(?,?,?,?)");
		$stmt->bind_param("ssss",$name,$email,$subject,$message);
		if($stmt->execute())
		{
			$sucessmessage="thank you for u r feedback!!";
			$name=$email=$subject=$message="";
		}
		else
		{
			echo "error:".$stmt->error;
		}
		$stmt->close();
	}
}
function test_input($data)
{
	$data=htmlspecialchars($data);
	$data=trim($data);
	$data=stripcslashes($data);
	return $data;
}
$con->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FEEDBACK FORM </title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	NAME: <input type="text" name="name" value="<?php echo $name; ?>">
	<span class="error"> <?php echo $nameErr;?></span><br><br>
	EMAIL: <input type="text" name="email" value="<?php echo $email; ?>">
	<span class="error"> <?php echo $emailErr;?></span><br><br>
	SUBJECT: <input type="text" name="subject" value="<?php echo $subject; ?>">
	<span class="error"> <?php echo $subjectErr;?></span><br><br>
	Message:<textarea name="message" row="5" cols="40"><?php echo $message; ?></textarea>
	<span class="error"> <?php echo $messageErr;?></span><br><br>
	<input type="submit" name="submit" value="submit">
</form>
<span class="sucess"><?php echo $sucessmessage;?></span>
</body>
</html>