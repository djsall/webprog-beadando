<?php
include('./sites/database.php');

include('./sites/header.php');

session_start();
if (isset($_REQUEST['signin'])) {
	echo "trying to sign in";
}
?>
<form action="" method="post" class="form">
	<p class="bannerText">Sign in!</p>
	<input type="text" name="username" class="textinput" placeholder="Username">
	<input type="password" name="password" class="textinput" placeholder="Password">
	<input type="submit" value="Sign in!" class="formbutton" name="signin">
	<button type="button" id="signupRedirectBtn" class="formbutton">Sign up!</button>
</form>
<?php
include('./sites/footer.php');
?>
<script>
	function elById(id) {
		return document.getElementById(id);
	}
	elById("signupRedirectBtn").addEventListener("click", () => {
		document.location.replace("./index.php?page=signup");
	})
</script>
