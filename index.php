<?php
session_start();
//defining valid pages
$pages = array("landing", "login", "signup", "gallery", "upload", "logout", "create_db", "message", "404", "disp_messages", "videos", "landing2");
//if the request is for another page
if (isset($_GET['page'])) {
	//save the page into a variable
	$page = $_GET['page'];
	//check if that site is valid and the file exists
	if (in_array($page, $pages) && file_exists("./sites/{$page}.php")) {
		//compile the filename
		include("./sites/index_template.php");
	} else {
		//if the file isn't found, redirect to 404
		include("./sites/404.php");
	}
} else {
	header('Location: ./?page=landing');
}
