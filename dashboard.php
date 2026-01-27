<?php
session_start();
include 'components/verify_sesstion.php';
$pageTitle = "Dashboard";
include 'components/header.php';
?>

<body>
	hello dashboard
	<a href="backend/logout.php">Logout</a>
	<?php include 'components/footer.php' ?>
</body>

</html>