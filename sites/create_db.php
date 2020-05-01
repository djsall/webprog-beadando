<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_query($con, 'CREATE DATABASE IF NOT EXISTS test CHARACTER SET UTF8');
include('./sites/database.php');
query('CREATE TABLE IF NOT EXISTS users(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	email varchar(32),
	username varchar(32),
	password varchar(32)
)');
query('CREATE TABLE IF NOT EXISTS messages(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userid INT,
	message varchar(512)
)');
echo "created db if it didn't already exist";
