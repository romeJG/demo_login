let emailInput = document.getElementById("emailInput");
let passwordInput = document.getElementById("passwordInput");
let toggleIcon = document.getElementById("toggleIcon");
let btn = document.getElementById("btn");
let cb = document.getElementById("cb");
let ub = document.getElementById("ub");
let db = document.getElementById("db");

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

function create() {
	document.getElementById("c0").innerHTML = "Creating Forms:";
	document.getElementById("c1").innerHTML = "<label for=\"title\">Record Title:</label> <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Title\" />"
	document.getElementById("c2").innerHTML = "<label for=\"description\">Description:</label> <input id=\"desc\" name=\"desc\" type=\"text\" placeholder=\"Description\" />";
	document.getElementById("c3").innerHTML = "<button id=\"cb\" name=\"cb\" type=\"submit\">Create</button>";
	document.getElementById("c4").innerHTML = "";
}

function update() { // 2 
	document.getElementById("c0").innerHTML = "Updating Form:";
	document.getElementById("c1").innerHTML = "<label for=\"id\">Record ID to Update:</label> <input id=\"id\" name=\"id\" type=\"number\" placeholder=\"ID\" />";
	document.getElementById("c2").innerHTML = "<label for=\"title\">Record Title:</label> <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Title\" />";
	document.getElementById("c3").innerHTML = "<label for=\"description\">Description:</label> <input id=\"desc\" name=\"desc\" type=\"text\" placeholder=\"Description\" />";
	document.getElementById("c4").innerHTML = "<button id=\"ub\" name=\"ub\" type=\"submit\">Update</button>";
}

function del() {
	document.getElementById("c0").innerHTML = "Deletion Form:";
	document.getElementById("c1").innerHTML = "<label for=\"id\">Record ID to Delete:</label> <input id=\"id\" name=\"id\" type=\"number\" placeholder=\"ID\" />";
	document.getElementById("c2").innerHTML = "<button id=\"db\" name=\"db\" type=\"submit\">Delete</button>";
	document.getElementById("c3").innerHTML = "";
	document.getElementById("c4").innerHTML = "";
}
