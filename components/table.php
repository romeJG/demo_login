<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

// 3. SQL Query to fetch data
$sql = "SELECT id, record_title, descriptions, recorder_name, created_at FROM records";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Button</th>
        <th>ID</th>
        <th>Title</th>
        <th>Descriptions</th>
        <th>Name</th>
        <th>Time</th>
      </tr>";

// 4. Loop through and display rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> 
        <button id=\"ub\" name=\"ub\" class=\"lit\" type=\"button\" 
        onclick=\"update()\"> Update </button>
        <button id=\"db\" name=\"db\" class=\"lit\" type=\"submit\" value=\"{$row['id']}\"> Delete </button>
        </td>";
        // <button id="db" name="db" type="submit">Delete</button>
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["record_title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["descriptions"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}
echo "</table>";

$conn->close();