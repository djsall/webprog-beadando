<?php
include('./sites/database.php');

include('./sites/header.php');

?>
<form action="./index.php?site=signup" method="post" class="form">
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
