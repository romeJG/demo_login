<?php
include '../db/db_con.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = "";
	$email = "";
	$password = password_hash($_POST['passwordInput'], PASSWORD_BCRYPT);

	if (empty($name) || empty($email) || empty($_POST['passwordInput'])) {
		header('Location: ../register.php?register=failed');
		exit();
	}

	$stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');

	if ($stmt->execute([$name, $email, $password])) {
		header('Location: ../register.php?register=success');
		exit();
	} else {
		header('Location: ../register.php?register=failed');
		exit();
	}
} else {
	header('Location: ../register.php');
	exit();
}
