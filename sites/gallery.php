<?php

$FOLDER = './img/';
$MIMES = array('.jpg', '.png');
$DATE_FORMAT = "Y.m.d. H:i";

$pictures = array();
$olvaso = opendir($FOLDER);
while (($file = readdir($olvaso)) !== false) {
	if (is_file($FOLDER . $file)) {
		$ending = strtolower(substr($file, strlen($file) - 4));
		if (in_array($ending, $MIMES)) {
			$pictures[$file] = filemtime($FOLDER . $file);
		}
	}
}
closedir($olvaso);

include("./sites/header.php");
?>
<div class="gallery">
	<p class="bannerText">Galéria</p>
	<?php
	arsort($pictures);
	foreach ($pictures as $file => $date) {
	?>
		<div class="kep">
			<a href="<?php echo $FOLDER . $file ?>">
				<img src="<?php echo $FOLDER . $file ?>">
			</a>
			<p>Név: <?php echo $file; ?></p>
			<p>Dátum: <?php echo date($DATE_FORMAT, $date); ?></p>
		</div>
	<?php
	}
	?>
</div>
<?php
include("./sites/footer.php");
?>
