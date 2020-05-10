<?php
include('./sites/database.php');

if (isset($_SESSION['username'])) {
	echo "már be vagy jelentkezve";
}
if (isset($_REQUEST['signin']) && !isset($_SESSION['username'])) {
	if (strlen($_REQUEST['username']) > 0	&& strlen($_REQUEST['password']) > 0) {

		if (login($_REQUEST['username'], $_REQUEST['password'])) {
			$_SESSION['username'] = $_REQUEST['username'];
			header('Location: ./?page=landing');
		}
	}
}
?>
<form action="" method="post" class="form">
	<p class="bannerText">Sign in!</p>
	<input type="text" name="username" class="textinput" placeholder="Username">
	<input type="password" name="password" class="textinput" placeholder="Password">
	<input type="submit" value="Sign in!" class="formbutton" name="signin">
	<button type="button" id="signupRedirectBtn" class="formbutton">Sign up!</button>
</form>
<script>
	function elById(id) {
		return document.getElementById(id);
	}
	elById("signupRedirectBtn").addEventListener("click", () => {
		document.location.replace("./?page=signup");
	})
</script>
