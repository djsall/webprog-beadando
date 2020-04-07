<?php
$con = new mysqli_connection("localhost", "root", "", "felhasznalok");

function query($text) {
	global $con;
	return mysqli_query($con, mysqli_escape_string($con, $text));
}
