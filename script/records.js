let cb = document.getElementById("cb");
let ub = document.getElementById("ub");
let db = document.getElementById("db");
let id = '0';
let title = '';
let desc = '';

function create() {
	fetch('../components/create-form.php')
		.then(response => response.text())
		.then(html => {
			document.getElementById("c0").innerHTML = html;
		});
}

function update(id, tt, desc) {
	fetch('../components/update-form.php?update=' + id + '&title=' + tt + '&desc=' + desc)
		.then(response => response.text())
		.then(html => {
			document.getElementById("c0").innerHTML = html;
		});
}


