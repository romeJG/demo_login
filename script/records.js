let cb = document.getElementById("cb");
let ub = document.getElementById("ub");
let db = document.getElementById("db");

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

