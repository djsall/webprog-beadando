<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_query($con, 'CREATE DATABASE IF NOT EXISTS test CHARACTER SET UTF8');
include('./sites/database.php');
query('CREATE TABLE IF NOT EXISTS users(
	id int AUTO_INCREMENT,
	email varchar(32),
	username varchar(32),
	password varchar(32)
)');
echo "created db if it didn't already exist";
