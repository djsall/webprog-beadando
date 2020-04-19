<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_query($con, 'CREATE DATABASE [IF NOT EXISTS] test [CHARACTER SET UTF8]');
include('./sites/database.php');
query('CREATE TABLE [IF NOT EXISTS] users(
	id int [NOT NULL] [AUTO INCREMENT],
	email varchar(32) [NOT NULL],
	username varchar(32) [NOT NULL],
	password varchar(32) [NOT NULL]
)');
