<?php
include_once __DIR__.'/layouts/header.php';
$email=$password="";
?>
<body>
    <form action="post" method="">
		<h1>Sign In</h1>
		<input name="email" type="email" placeholder="Email" value="<?php echo $email ?>" required>
		<input name="password" type="password" minlength="8" placeholder="Password" value="<?php echo $email ?>" required>
		<button type="submit" name="submit">Sign In</button>
        <div class="a">
        <a href="reset.php">Forget your password?</a>
        </div>
	  </form> 
</body>
</html>