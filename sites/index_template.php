<?php include("./include/navbar_texts.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php
		if (isset($_SESSION['username'])) $username = $_SESSION['username'];
		$site_name = "Ételt az életért";
		if (isset($_SESSION['username']))
			echo $_SESSION['username'] . " - " . $site_name;
		else
			echo $site_name;
		?>
	</title>
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<nav>
		<ul class="navList">
			<?php foreach ($navbar as $page_name => $nav_item) { ?>
				<li class=navListItem>
					<a href="./?page=<?= $nav_item["file"] ?>"> <?= $nav_item["text"] ?> </a> </li> <?php } ?> </ul>
	</nav>
	<?php include("./sites/{$page}.php"); ?>

</body>

</html>
