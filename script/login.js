let emailInput = document.getElementById("emailInput");
let passwordInput = document.getElementById("passwordInput");
let toggleIcon = document.getElementById("toggleIcon");
let btn = document.getElementById("btn");


function showPass() {
	if (passwordInput.type === "password") {
		btn.classList.replace("red", "blue");
		toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
		passwordInput.type = "text"
	} else {
		btn.classList.replace("blue", "red");
		toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
		passwordInput.type = "password"
	}
}

function isValidEmailHTML(email) {
	const input = document.createElement('input');
	input.type = 'email';
	input.value = email;
	return input.checkValidity();
}

function login() {
	let nn = emailInput.value.trim();
	let pp = passwordInput.value.trim();
	if (nn.length === 0) {
		swal("No Email", "Please enter Username", "warning")
	}
	else if (!isValidEmailHTML(nn)) {
		swal("Invalid Email", "Please enter valid email address", "error")
	}
	else if (pp.length === 0) {
		swal("No Password", "Please enter password", "warning")
	}
	else {
		swal("Successfully Logged In", "Click ok", "success")
	}
}
