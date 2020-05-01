<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php
		if (isset($_SESSION['username'])) $username = $_SESSION['username'];
		$site_name = "under development";
		if (isset($_SESSION['username']))
			echo $_SESSION['username'] . " - " . $site_name;
		else
			echo $site_name;
		?>
	</title>
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<?php

	$current_page = $_GET['page'];
	?>
	<nav>
		<ul class="navList">
			<li class="navListItem">
				<a href="./index.php?page=landing">Kezdőlap</a>
			</li>
			<li class="navListItem">
				<a href="./index.php?page=landing2">Aloldal</a>
			</li>
			<li class="navListItem">
				<a href="./index.php?page=videos">Videók</a>
			</li>
			<li class="navListItem">
				<?php
				if ($current_page == "gallery") {
					echo '<a href="./index.php?page=upload">Kép feltöltése</a>';
				} else {
					echo '<a href="./index.php?page=gallery">Galéria</a>';
				}
				?>
			</li>
			<li class="navListItem">
				<?php
				if ($current_page == "message") {
					echo '<a href="./index.php?page=disp_messages">Beküldött üzenetek</a>';
				} else {
					echo '<a href="./index.php?page=message">Üzenet küldése</a>';
				}
				?>

			</li>
			<li class="navListItem">
				<?php
				if (isset($username)) {
					echo "<p>{$username}</p>";
				} else {
					echo '<a href="./index.php?page=login">Bejelentkezés!</a>';
				}

				?>
			</li>


			<?php
			if (isset($username)) {
				echo '<li class="navListItem">';
				echo '<a href="./index.php?page=logout">Log out!</a>';
				echo '</li>';
			}
			?>

		</ul>
	</nav>
