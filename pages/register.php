<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Register" ?>
<?php require "../components/header.php" ?>
<?php require "../db/db_con.php" ?>
<!-- somechanges -->

<body>
	<form action="../backend/register_process.php" method="POST">
		<div class="first">
			<div class="col">
				<img src="../image/im.png" alt="Description of the image">
			</div>
			<div class="col">
				<div class="row">
					<label for="nameInput">Name:</label>
					<input id="nameInput" name="nameInput" type="text" placeholder="name" />
				</div>
				<div class="row">
					<label for="emailInput">Email:</label>
					<input id="emailInput" name="emailInput" type="email" placeholder="email" />
				</div>
				<div class="row">
					<label for="passwordInput">Password:</label>
					<input id="passwordInput" name="passwordInput" type="text" placeholder="password" />
					<button id="btn" class="blue" type="button" onclick="showPass()">
						<i id="toggleIcon" class="fa fa-eye"></i>
					</button>
				</div>
				<div class="row">
					<button id="registerBtn" type="submit">Register</button>
				</div>
				<div class="row">
					<a href="index.php">Login</a>
				</div>
				<div class="row">
					<?php
					if (isset($_GET['register'])) {
						if ($_GET['register'] == 'success') {
							echo 'Registered Successfully';
						} elseif ($_GET['register'] == 'failed') {
							echo 'Registration Failed';
						} elseif ($_GET['register'] == 'inc') {
							echo 'Incomplete Details';
						}
					}
					?>
				</div>

			</div>
		</div>
	</form>
	</div>
	<script src="../script/login.js"></script>
	<?php require "../components/footer.php" ?>
</body>

</html>