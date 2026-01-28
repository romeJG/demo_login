let cb = document.getElementById("cb");
let ub = document.getElementById("ub");
let db = document.getElementById("db");

function create() {
	fetch('../components/create-form.php')
		.then(response => response.text())
		.then(html => {
			document.getElementById("c0").innerHTML = html;
		});
}

function update() { // 2 
	fetch('../components/update-form.php')
		.then(response => response.text())
		.then(html => {
			document.getElementById("c0").innerHTML = html;
		});
}

function del() {
	fetch('../components/delete-form.php')
		.then(response => response.text())
		.then(html => {
			document.getElementById("c0").innerHTML = html;
		});
}

