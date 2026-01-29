<?php

require '../components/verify_sesstion.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id, prev_id, record_title, descriptions, recorder_name, created_at, deleted_at FROM deleted";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='10' id='inputTable'>";
echo "<thead> <tr>
        <th>Button</th>
        <th>ID</th>
        <th>Previous ID</th>
        <th>Title</th>
        <th>Descriptions</th>
        <th>Name</th>
        <th>Time Created</th>
        <th>Time Deleted</th>
      </thead> </tr> <tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> 
        <button id=\"ub\" name=\"ub\" class=\"lit\" type=\"button\" 
        onclick=\"update('{$row['id']}', '{$row['record_title']}', '{$row['descriptions']}')\"> Update </button>
        <button id=\"db\" name=\"db\" class=\"lit\" type=\"submit\" value=\"{$row['id']}\"> Delete </button>
        </td>"; // new buttons 
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["prev_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["record_title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["descriptions"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["deleted_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No records found</td></tr>";
}
echo "</tbody> </table>";

$conn->close();