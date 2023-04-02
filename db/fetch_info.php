<?php
include('db.php');

$sql = "SELECT name,address FROM hospitals";
$result = mysqli_query($conn, $sql);

// Convert the result to a JSON object and return it
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;

}

echo json_encode($data);
?>