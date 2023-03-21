<?php
include('db.php');

$sql = "SELECT lat, lon FROM hospitals";
$result = $conn->query($sql);
$locations = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = array('lat' => $row['lat'], 'lng' => $row['lon']);
    }
}
$conn->close();

echo json_encode($locations);
?>