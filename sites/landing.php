<?php
session_start();

$username;
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
include('./sites/header.php');


include('./sites/footer.php');
