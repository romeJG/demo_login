<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

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

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> 
        <button id=\"ub\" name=\"ub\" class=\"lit\" type=\"button\" 
        onclick=\"update('{$row['id']}', '{$row['record_title']}', '{$row['descriptions']}')\"> Update </button>
        <button id=\"db\" name=\"db\" class=\"lit\" type=\"submit\" value=\"{$row['id']}\"> Delete </button>
        </td>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["record_title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["descriptions"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}
echo "</table>";

$conn->close();