<?php
include('./sites/database.php');

if (isset($_REQUEST['send']) && isset($_REQUEST['text'])) {
	saveMessage($_REQUEST['text']);
}
?>
<form action="" class="form" method="POST">
	<p class="bannerText">Üzenet küldése</p>
	<textarea name="text" maxlength="512" minlength="8" oninput="inputFunc()"></textarea>
	<input type="submit" value="Küldés!" name="send">
</form>
<script>
	let textarea = document.getElementsByName("text")[0];
	let submit = document.getElementsByName("send")[0];

	submit.disabled = true;

	function inputFunc() {
		if (textarea.value.length > 8 && textarea.value.length < 512 && submit.disabled)
			submit.disabled = false;
	}
</script>
