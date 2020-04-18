<?php
//connecting to the db
$con = mysqli_connect("localhost", "root", "", "test");
//signing up a new user
//returns:
// - true: signup was successful
// - false: signup failed
function signUp($username, $password, $confirmPassword, $email)
{
	if (isEmailAvaliable($email)) {
		if (isUsernameAvaliable($username)) {
			if ($password == $confirmPassword) {
				query("INSERT INTO users ('email', 'username', 'password') VALUES ('{escape($email)}', '{escape($username)}', '{escape($password)}'");
				return true;
			} else {
				printErr("A megadott jelszavak nem egyeznek!");
				return false;
			}
		} else {
			printErr("A Felhasználónév már foglalt!");
			return false;
		}
	} else {
		printErr("Az E-Mail cím már foglalt!");
		return false;
	}
}
//Checks if an username is taken or not
//returns:
// - true: username is avaliable
// - false: username is already taken
function isUsernameAvaliable($username)
{
	$escaped = escape($username);
	$result = query("SELECT * FROM users WHERE username='{$escaped}';");

	$resultCount = countResults($result);

	if ($resultCount < 1) {
		return true;
	} else {
		printErr("A felhasználónév már foglalt!");
		return false;
	}
}
//Checks if an email is taken or not
//returns:
// - true: email is avaliable
// - false: email is already taken
function isEmailAvaliable($email)
{
	$escaped = escape($email);
	$result = query("SELECT * FROM users WHERE username='{$escaped}';");

	$resultCount = countResults($result);

	if ($resultCount < 1) {
		return true;
	} else {
		printErr("Az E-Mail cím már foglalt!");
		return false;
	}
}
//Checks if the provided username and password match an existing user
//returns:
// - true: credentials valid
// - false: credentials invalid
function isValidLogin($username, $password)
{
	$esc_usr = escape($username);
	$esc_pass = escape($password);
	$result = query("SELECT * FROM users WHERE username='{$esc_usr}' AND password='{$esc_pass}'");
	$count = countResults($result);

	if ($count == 1) {
		return true;
	} else {
		printErr("Hibás felhasználónév és/vagy jelszó");
		return false;
	}
}
//shorthand function for escaping string
function escape($string)
{
	global $con;
	$escaped = mysqli_escape_string($con, $string);
	return $escaped;
}
//shorthand function for running queries !!!NOT ESCAPED INSIDE!!!
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
	while ($row = mysqli_fetch_assoc($result)) {
		$resultCount++;
	}

	return $resultCount;
}
//prints an error in a better manner
function printErr($err)
{
	echo "<p class='error-item'>" . $err . "</p>";
}
