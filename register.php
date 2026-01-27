<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Register" ?>
<?php require "components/header.php" ?>
<?php require "db/db_con.php" ?>

<body>
	<!-- Login Form -->
	<form action="backend/register_process.php" method="POST">
		<div class="flex flex-column login-container">
			<?php
			if (isset($_GET['register'])) {
				if ($_GET['register'] == 'success') {
					echo 'Registered Successfully';
				} elseif ($_GET['register'] == 'failed') {
					echo 'Registration Failed';
				}
			}
			?>
			<div>
				<label for="nameInput">Name:</label>
				<input id="nameInput" name="nameInput" type="text" placeholder="name" />
			</div>
			<div>
				<label for="emailInput">Email:</label>
				<input id="emailInput" name="emailInput" type="email" placeholder="email" />

			</div>
			<div>
				<label for="passwordInput">Password:</label>
				<input id="passwordInput" name="passwordInput" type="text" placeholder="password" />
			</div>
		</div>
		<div>
			<button id="btn" class="blue" type="button" onclick="showPass()">
				<i id="toggleIcon" class="fa fa-eye"></i>
			</button>
			<button id="registerBtn" type="submit">Register</button>
			<a href="index.php">Login</a>
		</div>
	</form>
	</div>
	<!-- scripts area -->
	<script src="script/login.js"></script>
	<?php require "components/footer.php" ?>
	<!-- end of scripts area -->
</body>

</html>