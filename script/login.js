let passwordInput = document.getElementById("passwordInput");
let toggleIcon = document.getElementById("toggleIcon");
let btn = document.getElementById("btn");

function showPass() {
	if (passwordInput.type === "password") {
		btn.classList.remove("red")
		btn.classList.add("blue")
		toggleIcon.classList.remove("fa-eye-slash")
		toggleIcon.classList.add("fa-eye")
		passwordInput.type = "text"
	} else {
		btn.classList.remove("blue")
		btn.classList.add("red")
		toggleIcon.classList.remove("fa-eye")
		toggleIcon.classList.add("fa-eye-slash")
		passwordInput.type = "password"
	}
}


function login() {
	// swal("Successfully logged in")
	swal("Head", "message", "")
}