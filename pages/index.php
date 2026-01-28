<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Login" ?>
<?php require "../components/header.php" ?>
<?php require "../db/db_con.php" ?>

<body>
	<form action="../backend/login_process.php" method="POST">
		<div class="first">
			<div class="col">
				<img src="../image/im.png" alt="Description of the image">
			</div>
			<div class="col">
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
					<button id="login" type="submit">login</button>
				</div>
				<div class="row">
					<a href="register.php">Register</a>
				</div>
				<div class="row">
					<?php if (isset($_GET['login'])) {
						if ($_GET['login'] == 'failed') {
							echo 'Login Failed';
						} else if ($_GET['login'] == 'inc') {
							echo 'Incomplete Details';
						}
					} ?>
				</div>
			</div>
		</div>
	</form>
	<script src="../script/login.js"></script>
	<?php require "../components/footer.php" ?>
</body>

</html>