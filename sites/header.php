<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php
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
