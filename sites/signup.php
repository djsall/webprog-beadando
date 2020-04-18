<?php
include('./sites/database.php');

include('./sites/header.php');

session_start();

if (isset($_REQUEST['signup']) && !isset($_SESSION['username'])) {
	$email = $_REQUEST['email'];
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$cPassword = $_REQUEST['confirmPassword'];
	if (
		strlen($email) > 0
		&& strlen($username) > 0
		&& strlen($password) > 0
		&& strlen($cPassword) > 0
	) {
		if (signup($username, $password, $cPassword, $email)) {
			header('Location: ./index.php?page=login');
		}
	}
}

?>
<form action="" method="post" class="form">
	<p class="bannerText">Sign up!</p>
	<input type="text" name="email" class="textinput" placeholder="E-Mail">
	<input type="text" name="username" class="textinput" placeholder="Username">
	<input type="password" name="password" class="textinput" placeholder="Password">
	<input type="password" name="confirmPassword" class="textinput" placeholder="Confirm Password">
	<input type="submit" value="Sign up!" class="formbutton" name="signup">
	<button type="button" id="signinRedirectBtn" class="formbutton">Sign in!</button>
</form>
<?php
include('./sites/footer.php');
?>
<script>
	function elById(id) {
		return document.getElementById(id);
	}

	elById("signinRedirectBtn").addEventListener("click", () => {
		document.location.replace("./index.php?page=login");
	})
</script>
