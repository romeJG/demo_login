<?php

require '../components/verify_sesstion.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

$perpage = 3;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int) $_GET['page'];
} else {
    $current_page = 1;
}
$start = ($current_page - 1) * $perpage;
$sql = "SELECT COUNT(*) FROM records";
$results = $conn->query($sql);
$total_records = mysqli_fetch_array($results)[0];
$total_pages = ceil($total_records / $perpage);

$sql = "SELECT id, record_title, descriptions, recorder_name, recorder_id, created_at FROM records LIMIT $start, $perpage";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='10' id='rec'>";
echo "<thead> <tr>
        <th>Button</th>
        <th>ID</th>
        <th>Title</th>
        <th>Descriptions</th>
        <th>Name</th>
        <th>Recorder ID</th>
        <th>Time</th>
      </tr> </thead> <tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> 
        <button id=\"ub\" name=\"ub\" class=\"lit\" type=\"button\" 
        onclick=\"modify('{$row['id']}', '{$row['record_title']}', '{$row['descriptions']}')\"> Update </button>
        <button id=\"db\" name=\"db\" class=\"lit\" type=\"submit\" value=\"{$row['id']}\"> Delete </button>
        </td>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["record_title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["descriptions"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td id='emp' colspan='7'>No Records Found</td></tr>";
}
echo "</tbody> </table>";

$conn->close();