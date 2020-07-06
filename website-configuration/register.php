<?php 
include 'config.php';

if ($login == 1) {
	echo "<meta http-equiv='refresh' content='0; url=profile.php'>";
} else {

if(isset($_POST["u_btn"])) {
	$u_name = $_POST['u_name'];
	$u_email = $_POST['u_email'];
	$u_pass = $_POST['u_pass'];
	if(empty($u_name) || empty($u_email) || empty($u_pass)) {
		echo "silahkan lengkapi data";
	} else {
		$insert = mysqli_query($conn,"INSERT INTO `users` (`u_name`, `u_email`, `u_pass`) VALUES ('$u_name', '$u_email', '$u_pass');");
		echo "Sukses";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		body {
			font-family: arial;
			background-color: #eaeaea;
		}

	</style>
</head>
<body>

	<form action="register.php" method="post">
		<h2>Register</h2>
	<label>Name</label>
	<input type="text" name="u_name" value=""><br>
	<label>Email</label>
	<input type="email" name="u_email" value=""><br>
	<label>Password</label>
	<input type="password" name="u_pass" value=""><br>
	<input type="submit" name="u_btn" value="sign up"><br>
	<a href="login.php">sign in</a>
</form>

</body>
</html>

<?php } ?>