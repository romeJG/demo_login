<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../components/verify_sesstion.php';
$pageTitle = "Dashboard";
require '../components/header.php';
require "../db/db_con.php" ?>

<body>
	<div class="row">
		hello dashboard
	</div>
	<div class="row">
		<a href="records.php">Records</a>
	</div>
	<div class="row">
		<a href="../backend/logout.php">Logout</a>
	</div>
	<?php include '../components/footer.php' ?>
</body>

</html>