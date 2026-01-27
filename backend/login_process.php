<?php
include '../db/db_con.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['emailInput'];
	if (empty($email) || empty($_POST['passwordInput'])) {
		header('Location: ../index.php?login=failed');
		exit();
	}

	$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');

	if ($stmt->execute([$email])) {
		$user = $stmt->fetch();
		if ($user && password_verify($_POST['passwordInput'], $user['password'])) {
			session_start();
			$_SESSION['user_id'] = $user['id'];
			header('Location: ../dashboard.php');
			exit();
		} else {
			header('Location: ../index.php?login=failed');
			exit();
		}
	} else {
		header('Location: ../index.php?login=failed');
		exit();
	}
}
