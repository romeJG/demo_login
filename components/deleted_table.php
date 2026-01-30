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
$sql = "SELECT COUNT(*) FROM deleted";
$results = $conn->query($sql);
$total_records = mysqli_fetch_array($results)[0];
$total_pages = ceil($total_records / $perpage);
// if out of bounds 
if (($current_page > $total_pages) || ($current_page < 1)) {
    $current_page = 1;
}
$start = ($current_page - 1) * $perpage;

$sql = "SELECT id, prev_id, record_title, descriptions, recorder_name, recorder_id, created_at, deleted_at FROM deleted LIMIT $start, $perpage";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='10'>";
echo "<thead> <tr>
        <th>Button</th>
        <th>ID</th>
        <th>Previous ID</th>
        <th>Title</th>
        <th>Descriptions</th>
        <th>Name</th>
        <th>Recorder ID</th>
        <th>Time Created</th>
        <th>Time Deleted</th>
      </tr> </thead> <tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> <input type=\"hidden\" name=\"start\" value=\"$start\" />   
        <input type=\"hidden\" name=\"records\" value=\"$total_records\" />
        <input type=\"hidden\" name=\"page\" value=\"$current_page\" />
        <button id=\"rb\" name=\"rb\" class=\"lit\" type=\"submit\" 
        value=\"{$row['id']}\"> Restore </button>
        </td>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["prev_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["record_title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["descriptions"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["recorder_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["deleted_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No Records Found</td></tr>";
}
echo "</tbody> </table>";

$conn->close();