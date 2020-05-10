<?php
include('./sites/database.php');

$messages_q = mysqli_query($con, "SELECT userid, message FROM messages ORDER BY id DESC");
?>

<ul>
	<?php
	while ($row = mysqli_fetch_row($messages_q)) {
		echo "<li>Felhasználó: {$row[0]} - {$row[1]}</li>";
	}
	?>
</ul>
