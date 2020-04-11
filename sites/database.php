<?php
//connectin to the db
$con = mysqli_connect("localhost", "root", "", "test");
//Checks if an username is taken or not
//returns:
// - true: username is avaliable
// - false: username is already taken
function isUsernameAvaliable($username)
{
	$escaped = escape($username);
	$result = query("SELECT * FROM users WHERE username={$escaped};");

	$resultCount = countResults($result);

	if ($resultCount == 1)
		return true;
	else
		return false;
}
//Checks if the provided username and password match an existing user
//returns:
// - true: credentials valid
// - false: credentials invalid
function isValidLogin($username, $password)
{
	$result = query("SELECT * FROM users WHERE username={escape($username)} AND password={escape($password)}");
	$count = countResults($result);
	if ($count == 1)
		return true;
	else
		return false;
}
//shorthand function for escaping string
function escape($string)
{
	global $con;
	$escaped = mysqli_escape_string($con, $string);
	return $escaped;
}
//shorthand function for running queries
function query($querystring)
{
	global $con;
	$result = mysqli_query($con, $querystring);
	return $result;
}
//shorthand function for counting the results in queries
function countResults($result)
{
	$resultCount = 0;
	while ($row = mysqli_fetch_assoc($result)) $resultCount++;
	return $resultCount;
}
