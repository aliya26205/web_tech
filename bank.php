<?php
class investment 
{
    public $amt;
	public $dur;
	public function __construct($amt,$dur)
	{
		$this->amt=$amt;
		$this->dur=$dur;
	}
	public function maturatity_call()
	{
		echo "main class method";
	}
}
class sbi extends investment
{
	public $r=6.5;
	public $ma;
	public function __construct($amt,$dur)
	{
		parent::__construct($amt,$dur);
	}
	public function maturatity_call()
	{
		$this->si=($this->amt*$this->dur*$this->r)/100;
		$this->ma=$this->si+$this->amt;
		echo "Maturity amount is:$this->ma";
	}
}
class cbi extends investment
{
	public $r=5.6;
	public $ma;
	public function __construct($amt,$dur)
	{
		parent::__construct($amt,$dur);
	}
	public function maturatity_call()
	{
		$this->si=($this->amt*$this->dur*$this->r)/100;
		$this->ma=$this->si+$this->amt;
		echo "Maturity amount is:$this->ma";
	}
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$name=$_POST['name'];
	$amt=$_POST['amt'];
	$dur=$_POST['dur'];
	if (empty($name)||empty($amt)||empty($dur)) {
		die("Enter all detailss");
	}
	$val=$_POST['bank'];
	if ($val=="sbi") {
		$bank=new sbi($amt,$dur);
		$bank->maturatity_call();
	}
	else{
		$bank=new cbi($amt,$dur);
		$bank->maturatity_call();
	}
}
?>