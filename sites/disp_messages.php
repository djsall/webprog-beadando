<?php
session_start();
include('./sites/database.php');
include('./sites/header.php');

$messages_q = mysqli_query($con, "SELECT userid, message FROM messages");
?>

<ul>
	<?php
	while ($row = mysqli_fetch_row($messages_q)) {
		echo "<li>Felhasználó: {$row[0]} - {$row[1]}</li>";
	}
	?>
</ul>

<?php
include('./sites/footer.php');
?>
