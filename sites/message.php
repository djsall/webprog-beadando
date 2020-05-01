<?php
session_start();
include('./sites/database.php');
include('./sites/header.php');

if (isset($_REQUEST['send']) && isset($_REQUEST['text'])) {
	saveMessage($_REQUEST['text']);
}
?>
<form action="" class="form" method="POST">
	<p class="bannerText">Üzenet küldése</p>
	<textarea name="text"></textarea>
	<input type="submit" value="Küldés!" name="send">
	<button type="button" id="messagesRedirectBtn" class="formbutton">Küldött üzenetek megjelenítése</button>
</form>
<?php
include('./sites/footer.php');
?>
<script>
	function elById(id) {
		return document.getElementById(id);
	}
	elById("messagesRedirectBtn").addEventListener("click", () => {
		document.location.replace("./index.php?page=disp_messages");
	})
</script>
