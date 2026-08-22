<?php
class employee
{
	public $ename;
	public $eno;
	function __construct($ename,$eno)
	{
		$this->ename=$ename;
		$this->eno=$eno;
	}
}
class fulltime extends employee
{
	public $bsal=10000;
	public $da,$hra,$pf,$gp,$net;
	public function __construct($ename,$eno)
	{
		parent::__construct($ename,$eno);
	}
	public function compute()
	{
		$this->da=$this->bsal*0.45;
		$this->hra=$this->bsal*0.1;
		$this->pf=$this->bsal*0.07;
		$this->gp=$this->bsal+$this->da+$this->hra;
		$this->net=$this->gp-$this->pf;
	}
	public function display()
	{
		echo "<table border=2>
		<tr><td>Emp No:</td>
			<td>$this->eno</td></tr>
		<tr><td>Emp Name:</td>
			<td>$this->ename</td></tr>
		<tr><td>Bsal:</td><td>$this->bsal</td></tr>
		<tr><td>DA:</td><td>$this->da</td></tr>
		<tr><td>HRA:</td><td>$this->hra</td></tr>
		<tr><td>Pf:</td><td>$this->pf</td></tr>
		<tr><td>gp:</td><td>$this->gp</td></tr>
		<tr><td>net:</td><td>$this->net</td></tr>
	</table>";
	}
}
class parttime extends employee
{
	public $bsal=10000;
	public $gp,$net,$hrs=1;
	public function __construct($ename,$eno)
	{
		parent::__construct($ename,$eno);
	}
	public function compute()
	{
		$this->gp=$this->bsal*$this->hrs*6;
		$this->net=$this->gp-500;
	}
	public function display()
	{
		echo "<table border=2>
		<tr><td>Emp No:</td>
			<td>$this->eno</td></tr>
		<tr><td>Emp Name:</td>
			<td>$this->ename</td></tr>
		<tr><td>Bsal:</td><td>$this->bsal</td></tr>
		<tr><td>gp:</td><td>$this->gp</td></tr>
		<tr><td>net:</td><td>$this->net</td></tr>
	</table>";
	}
}
if (isset($_POST['submit'])) {
	$val=$_POST['job'];
	if ($val=='fulltime') {
		$emp=new fulltime($_POST['ename'],$_POST['eno']);
		$emp->compute();
		$emp->display();
	}
	if ($val=='parttime') {
		$emp=new parttime($_POST['ename'],$_POST['eno']);
		$emp->compute();
		$emp->display();
	}
}
?>