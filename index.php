<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Login" ?>
<?php require "components/header.php" ?>
<?php require "db/db_con.php" ?>

<body>
	<!-- Login Form -->

	<form action="backend/login_process.php" method="POST">
		<?php if (isset($_GET['login'])) {
			if ($_GET['login'] == 'failed') {
				echo 'Login Failed';
			}
		} ?>
		<div class="flex flex-column login-container">
			<label for="emailInput">email:</label>
			<input id="emailInput" type="email" placeholder="username" />
			<label for="passwordInput">Password:</label>
			<input id="passwordInput" type="text" placeholder="password" />
		</div>
		<div>
			<button id="btn" class="blue" onclick="showPass()">
				<i id="toggleIcon" class="fa fa-eye"></i>
			</button>
			<button id="login" type="submit">login</button>
			<a href="register.php">Register</a>
		</div>
	</form>
	</div>
	<!-- scripts area -->
	<script src="script/login.js"></script>
	<?php require "components/footer.php" ?>
	<!-- end of scripts area -->
</body>

</html>