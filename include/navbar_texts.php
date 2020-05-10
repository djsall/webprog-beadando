<?php
$navbar = array(
	"create_db" => array("file" => "create_db", "text" => "Adatbázis Létrehozása"),
	"landing" => array("file" => "landing", "text" => "Kezdőlap"),
	"landing2" => array("file" => "landing2", "text" => "Aloldal"),
	"videos" => array("file" => "videos", "text" => "Videók"),
	"gallery" => array("file" => "gallery", "text" => "Galéria"),
	"upload" => array("file" => "upload", "text" => "Kép Feltöltése"),
	"message" => array("file" => "message", "text" => "Üzenet Küldése"),
	"disp_messages" => array("file" => "disp_messages", "text" => "Üzenetek megjelenítése"),
	"login" => array("file" => "login", "text" => "Bejelentkezés")


);

if (isset($_SESSION['username'])) {
	$navbar["login"] = array("file" => "landing", "text" => $_SESSION['username']);
	$navbar["logout"] = array("file" => "logout", "text" => "Kijelentkezés");
}
