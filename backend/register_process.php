<?php
include '../db/db_con.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['nameInput']);
	$email = trim($_POST['emailInput']);
	$pass = trim($_POST['passwordInput']);
	$password = password_hash($pass, PASSWORD_BCRYPT);

	if (empty($name) || empty($email) || empty($pass)) {
		header('Location: ../pages/register.php?register=inc');
		exit();
	}

	$stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');

	if ($stmt->execute([$name, $email, $password])) {
		header('Location: ../pages/register.php?register=success');
		exit();
	} else {
		header('Location: ../pages/register.php?register=failed');
		exit();
	}
} else {
	header('Location: ../pages/register.php');
	exit();
}
