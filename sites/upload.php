<?php
$FOLDER = './img/';
$MIMETYPES = array('image/jpeg', 'image/png');
$MAXRES = 2000 * 2000;

$message = "";
if (isset($_SESSION['username'])) {
	if (isset($_POST['send'])) {
		foreach ($_FILES as $file) {
			if ($file['error'] == 4);
			elseif (!in_array($file['type'], $MIMETYPES))
				$message = "Nem megfelelő fájlkiterjesztés: " . $file['name'];
			elseif (
				$file['error'] == 1
				or $file['error'] == 2
				or $file['size'] > $MAXRES
			)
				$message = "Túl nagy állomány: " . $file['name'];
			else {
				$vegsohely = $FOLDER . strtolower($file['name']);
				if (file_exists($vegsohely))
					$message = "Már létezik: " . $file['name'];
				else {
					move_uploaded_file($file['tmp_name'], $vegsohely);
					$message = 'Feltöltve: ' . $file['name'];
				}
			}
		}
	}
} else {
	$message = "Kérem jelentkezzen be a feltöltés előtt!";
}
?>

<form action="" method="post" enctype="multipart/form-data" class="form">
	<p class="bannerText">Képek feltöltése:</p>
	<input type="file" name="picture" required>
	<input type="submit" name="send" value="Feltölt!">

	<?php echo "<p>$message</p>";	?>
</form>
