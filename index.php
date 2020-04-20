<?php
//defining valid pages
$pages = array("landing", "login", "signup", "gallery", "upload", "logout", "create_db");
//if the request is for another page
if (isset($_GET['page'])) {
	//save the page into a variable
	$page = $_GET['page'];
	//check if that site is valid and the file exists
	if (in_array($page, $pages) && file_exists("./sites/{$page}.php")) {
		//compile the filename
		$file = "./sites/{$page}.php";
		//pull in the selected file
		include($file);
	} else {
		//if the file isn't found, redirect to 404
		header("Location: ./sites/404.php");
	}
} else {
	header('Location: ./?page=landing');
}
