<?php
session_start();
include_once __DIR__.'/layouts/header.php';
include __DIR__.'/controller/registerController.php';

$email=$_SESSION['email'];
$register_controller=new RegisterController();
$user=$register_controller->getUser($email);
$reg_otp=$user['token'];
$otp=$otpErr="";
if(isset($_POST['submit'])){
	$otp=$_POST['otp'];
	if($otp==$reg_otp){
		echo "<script>location.href='signin.php'</script>";
	}else{
		$otpErr="OTP code is invalid!";
	}

}
?>
<body>
    <form method="post" action="">
		<h1>OTP Verification</h1>
        <p>We've send a verification code to your email. Please check your email.</p>
		<input name="otp" type="text" placeholder="Enter verification code"  value="<?php echo $otp ?>" required>
		<div class="error"><?php echo $otpErr; ?></div>
		<button type="submit" name="submit">Submit</button>
	  </form> 
</body>
</html>