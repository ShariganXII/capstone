<?php
include('db.php');

$sql = "SELECT DISTINCT name, address, lat, lng, rating FROM hospitals h
        INNER JOIN is_in i ON
            h.name = i.hospital_name
        INNER JOIN borough b ON
            i.bor_name = b.bor_name
        INNER JOIN designated de ON
            h.name = de.hospital_name
        INNER JOIN designations d ON
            de.des_name = d.des_name
        INNER JOIN perform p ON
            h.name = p.hospital_name
        INNER JOIN services s ON
            p.ser_name = s.ser_name";
$result = mysqli_query($conn, $sql);

// Convert the result to a JSON object and return it
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;

}

echo json_encode($data);
?>