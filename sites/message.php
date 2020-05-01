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
</form>
<?php
include('./sites/footer.php');
?>
