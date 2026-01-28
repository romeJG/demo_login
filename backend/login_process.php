<?php
include '../db/db_con.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = trim($_POST['emailInput']);
	$password = trim($_POST['passwordInput']);
	if (empty($email) || empty($password)) {
		header('Location: ../pages/index.php?login=inc');
		exit();
	}

	$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');

	if ($stmt->execute([$email])) {
		$user = $stmt->fetch();
		if ($user && password_verify($password, $user['password'])) {
			session_start();
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['name'] = $user['email'];
			header('Location: ../pages/dashboard.php');
			exit();
		}
		header('Location: ../pages/index.php?login=failed');
		exit();

	} else {
		header('Location: ../pages/index.php');
		exit();
	}
}
