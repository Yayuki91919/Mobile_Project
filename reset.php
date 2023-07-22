<?php
include_once __DIR__.'/layouts/header.php';

$email="";
if(isset($_POST['submit'])){

}
?>
<body>
    <form method="post" action="">
		<h1>Reset Password</h1>
        <p>Enter your email address and we'll email you a verification code to reset your password.</p>
		<input name="email" type="email" placeholder="Email" value="<?php echo $email; ?>" required>
		<button type="submit" name="submit">Send</button>
	  </form> 
</body>
</html>