<?php
// establish connection with database
include '../db/db_con.php';

// if method is not post, return to register page 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// obtain name, email, and password from field and trim these of whitespace 
	$name = trim($_POST['nameInput']);
	$email = trim($_POST['emailInput']);
	$pass = trim($_POST['passwordInput']);
	// hash encrypt the password 
	$password = password_hash($pass, PASSWORD_BCRYPT);
	// if any of the fields are empty, return to register with query in complete 
	if (empty($name) || empty($email) || empty($pass)) {
		header('Location: ../pages/register.php?register=inc');
		exit();
	}
	// prepare pdo with sql query to add new user to the database 
	$stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
	// checks if successful insertion into database 
	if ($stmt->execute([$name, $email, $password])) {
		// succesful insertion and return to register with query success 
		header('Location: ../pages/register.php?register=success');
		exit();
	} else {
		// failed insertion and return to register with query failed 
		header('Location: ../pages/register.php?register=failed');
		exit();
	}
} else {
	header('Location: ../pages/register.php');
	exit();
}
