let cb = document.getElementById("cb");
let ub = document.getElementById("ub");
let db = document.getElementById("db");
let id = '0';
let title = '';
let desc = '';

function add() {
	let tableBody = document.getElementById("inputTable").getElementsByTagName('tbody')[0];
	let newRow = tableBody.insertRow(-1);

	let cell0 = newRow.insertCell(0);
	let cell1 = newRow.insertCell(1);
	let cell2 = newRow.insertCell(2);
	let cell3 = newRow.insertCell(3);
	let cell4 = newRow.insertCell(4);
	let cell5 = newRow.insertCell(5);

	cell0.innerHTML = '<button id="cb" name="cb" type="submit">Submit</button> <button type="button" onclick="remove(this)">Cancel</button>';
	cell2.innerHTML = '<input id="title" name="title" type="text" placeholder="Title" />';
	cell3.innerHTML = '<input id="desc" name="desc" type="text" placeholder="Description" />';
}

function remove(btn) {
	let row = btn.parentNode.parentNode;
	row.parentNode.removeChild(row);
}

function modify(id, tt, desc) { // 
	let ind = 0;
	// use id to find index 
	let tableBody = document.getElementById("inputTable").getElementsByTagName('tbody')[ind];
}

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


