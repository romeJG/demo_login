<?php
if (!isset($_SESSION['user_id'])) {
	header('Location: ../pages/index.php');
	exit();
}
