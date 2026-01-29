<?php
include '../db/db_con.php';

// if method is not post, redirect back to index page 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// gets email and password and trim off whitespace 
	$email = trim($_POST['emailInput']);
	$password = trim($_POST['passwordInput']);
	// if the email and password are empty, return to index page with query incomplete 
	if (empty($email) || empty($password)) {
		header('Location: ../pages/index.php?login=inc');
		exit();
	}
	// prepared pdo to access database using sql query 
	$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');

	// if email is found in the database 
	if ($stmt->execute([$email])) {
		// user information is fetched from database 
		$user = $stmt->fetch();
		// check if user information was fetched and if the 
		// provided password is identical to password from database 
		if ($user && password_verify($password, $user['password'])) {
			// start session of the user and track the user id and email 
			session_start();
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['name'] = $user['email'];
			// successfully logged into dashboard 
			header('Location: ../pages/dashboard.php');
			exit();
		}
		// if password is incorrect or no user, return to login page with query failed 
		header('Location: ../pages/index.php?login=failed');
		exit();

	} else {
		header('Location: ../pages/index.php');
		exit();
	}
}
