<?php
$pages = array("landing", "login", "signup");
if(isset($_GET['page'])) {
	$page = $_GET['page'];
	if(in_array($page, $pages) && file_exists("./sites/{$page}.php")) {
		$file = "./sites/{$page}.php";
		include($file);
	}else {
		print_r($pages);
		echo "not found";
		// header("HTTP/1.0 404 Not Found");
	}
}
