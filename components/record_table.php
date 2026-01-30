<?php

require '../components/verify_sesstion.php';
require "../db/db_tab.php";

$perpage = (isset($_GET['perpage']) && is_numeric($_GET['perpage']))
    ? (int) $_GET['perpage']
    : 5;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int) $_GET['page'];
} else {
    $current_page = 1;
}
$sql = "SELECT COUNT(*) FROM records";
$results = $conn->query($sql);
$total_records = mysqli_fetch_array($results)[0];
$total_pages = ceil($total_records / $perpage);
// if out of bounds 
if (($current_page > $total_pages) || ($current_page < 1)) {
    $current_page = 1;
}
$start = ($current_page - 1) * $perpage;

$sql = "SELECT id, record_title, descriptions, recorder_name, recorder_id, created_at FROM records LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $start, $perpage);
$stmt->execute();
$result = $stmt->get_result();

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
        echo "<td> <input type=\"hidden\" name=\"start\" value=\"$start\" />   
        <input type=\"hidden\" name=\"records\" value=\"$total_records\" />
        <input type=\"hidden\" name=\"page\" value=\"$current_page\" />
        <button id=\"ub\" name=\"ub\" class=\"lit\" type=\"button\" 
        onclick=\"modify('{$row['id']}', '{$row['record_title']}', '{$row['descriptions']}', '$current_page')\"> Update </button>
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