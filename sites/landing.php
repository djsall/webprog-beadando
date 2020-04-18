<?php
session_start();

$username;
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}

include('./sites/header.php');
?>
<nav>
	<ul class="navList">
		<li class="navListItem">
			<a href="./index.php?page=landing">Home</a>
		</li>
		<li class="navListItem">
			<a href="./index.php?page=gallery">Gallery</a>
		</li>
		<li class="navListItem">
			<?php
			if (isset($username)) {
				echo $username;
			} else {
				echo '<a href="./index.php?page=login">Sign in!</a>';
			}

			?>
		</li>
		<li class="navListItem">
			<?php
			if (isset($username)) {
				echo '<a href="./index.php?page=logout">Log out!</a>';
			} else {
				echo "placeholder";
			}

			?>
		</li>
	</ul>
</nav>



<?php
include('./sites/footer.php');
?>
