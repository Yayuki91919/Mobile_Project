<?php
include_once __DIR__.'/layouts/header.php';

// convert illegal input value to ligal value formate
function text_input($value) {
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
  }
  
$password=$cpassword=$passErr=$cpassErr="";
$uppercasePassword = "/(?=.*?[A-Z])/";
$lowercasePassword = "/(?=.*?[a-z])/";
$digitPassword = "/(?=.*?[0-9])/";
$spacesPassword = "/^$|\s+/";
$symbolPassword = "/(?=.*?[#?!@$%^&*-])/";

if(isset($_POST['submit'])){
	if (!preg_match($uppercasePassword,$_POST['password']) || !preg_match($lowercasePassword,$_POST['password']) ||  !preg_match($symbolPassword,$_POST['password']) || preg_match($spacesPassword,$_POST['password'])) {
		$passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
	  }
	  else{
		$password=text_input($_POST['password']);
	  }
	  if($_POST['cpassword']!=$_POST['password']){
		$cpassErr="Confirm Password doesn't Matched";
	 }
	 else{
		$cpassword=text_input($_POST['cpassword']);
	 }
}

?>
<body>
    <form>
		<h2>Create New Password</h2>
		<input name="password" type="password" placeholder="Enter your new password" value="<?php echo $password; ?>" minlength="8" required>
		<div class="error"><?php echo $passErr; ?></div>
		<input name="cpassword" type="password" placeholder="Enter your new confirm password" value="<?php echo $cpassword; ?>" minlength="8" required>
		<div class="error"><?php echo $cpassErr; ?></div>
		<button type="submit">Reset Password</button>
	  </form> 
</body>
</html>