<?php
//connecting to the db
$con = mysqli_connect("localhost", "root", "", "test");
//saving a message sent from the contact form
function saveMessage($message)
{
	global $con;
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		if (strlen($message) > 8 && strlen($message) < 512) {
			$escaped = escape($message);
			$userid_array = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM users WHERE username='{$username}'"));
			$userid = $userid_array['id'];
			query("INSERT INTO messages (userid, message) VALUES ('{$userid}', '{$escaped}')");
		} else echo "<p>Az üzenet maximum 512 karakter hosszú lehet, és minimum 8 karakterből kell álljon.</p>";
	} else echo "<p>Kérem jelentkezzen be, mielőtt üzenetet küldene!</p>";
}


//signing up a new user
//returns:
// - true: signup was successful
// - false: signup failed
function signup($username, $password, $confirmPassword, $email)
{
	if (checkEmail($email)) {
		if (checkUser($username)) {
			if ($password == $confirmPassword) {
				query("INSERT INTO users (email, username, password) VALUES ('" . escape($email) . "', '" . escape($username) . "', '" . escape($password) . "')");
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
function checkUser($username)
{
	$escaped = escape($username);
	$result = query("SELECT * FROM users WHERE username='{$escaped}';");

	$resultCount = -1;
	$resultCount = countResults($result);

	if ($resultCount == 0) {
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
function checkEmail($email)
{
	$escaped = escape($email);
	$result = query("SELECT * FROM users WHERE email='{$escaped}';");

	$resultCount = -1;
	$resultCount = countResults($result);

	if ($resultCount == 0) {
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
function login($username, $password)
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
