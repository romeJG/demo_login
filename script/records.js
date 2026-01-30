let cb = document.getElementById("cb");
let ub = document.getElementById("ub");
let db = document.getElementById("db");
let id = '0';
let title = '';
let desc = '';
let existbtn = 0;

function add() {
	let tableBody = document.getElementById("rec");
	for (let i = 0; i < tableBody.rows.length; i++) {
		if (tableBody.rows[i].querySelector('input:not([type="hidden"])')) return;
	}
	// if first row is no rec found, remove that row 
	let norec = document.getElementById("emp");
	if (norec) {
		let recrow = norec.parentNode.parentNode;
		recrow.parentNode.removeChild(recrow);
	}

	let newRow = tableBody.insertRow(-1);

	let cell0 = newRow.insertCell(0);
	let cell1 = newRow.insertCell(1);
	let cell2 = newRow.insertCell(2);
	let cell3 = newRow.insertCell(3);
	let cell4 = newRow.insertCell(4);
	let cell5 = newRow.insertCell(5);

	cell0.innerHTML = '<button id="cb" name="cb" type="submit">Submit</button> <button id="can" type="button" onclick="remove(this)">Cancel</button>';
	cell2.innerHTML = '<input id="title" name="title" type="text" placeholder="Title" />';
	cell3.innerHTML = '<input id="desc" name="desc" type="text" placeholder="Description" />';
}

function remove(btn) {
	let tableBody = document.getElementById("rec");
	let row = btn.parentNode.parentNode;
	row.parentNode.removeChild(row);
	if (tableBody.rows.length == 1) {
		let newRow = tableBody.insertRow(-1);
		let cell = newRow.insertCell(0);
		cell.id = "emp";
		cell.colSpan = 6;
		cell.innerHTML = "No Records Found";
	}
}

function modify(id, title, desc, page) {
	let tableBody = document.getElementById("rec");
	for (let i = 0; i < tableBody.rows.length; i++) {
		if (tableBody.rows[i].querySelector('input:not([type="hidden"])')) {
			return;
		}
	}

	let ind = findID(id);
	let row = tableBody.rows[ind];
	row.cells[0].innerHTML = `<input type="hidden" name="page" value="${page}" />
	<button id="ub" name="ub" type="submit" value="${id}">Submit</button>
	<button id="un" type="button" onclick="undo('${id}', '${title}', '${desc}')">Cancel</button>`;
	row.cells[2].innerHTML = `<input id="title" name="title" type="text" placeholder="Title" value="${title}" />`;
	row.cells[3].innerHTML = `<input id="desc" name="desc" type="text" placeholder="Description" value="${desc}" />`;
}

function undo(id, title, desc) {
	let table = document.getElementById("rec");
	let ind = findID(id);
	if (ind !== -1) {
		let row = table.rows[ind];
		row.cells[0].innerHTML = `
            <button class="lit" type="button" onclick="modify('${id}', '${title}', '${desc}')">Update</button>
            <button name="db" class="lit" type="submit" value="${id}">Delete</button>`;
		row.cells[2].textContent = title;
		row.cells[3].textContent = desc;
	}
}

function findID(id) {
	let table = document.getElementById("rec");
	let rows = table.rows;

	for (let i = 1; i < rows.length; i++) {
		// Access the second cell specifically
		let ind = rows[i].cells[1];
		if (ind && ind.textContent.trim() === id) {
			return i;
		}
	}
	return -1;
}