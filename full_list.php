<?php
include('header.php')
    ?>

<main>
    <div class="box-container">
        <div class="search-wrapper">
            <h1>Full Hospital List</h1>
            <div class="result-box">
                <?php
                $sql = "SELECT DISTINCT
                            h.name,
                            h.address,
                            b.bor_name,
                            h.lat,
                            h.lng
                        FROM hospitals h
                            INNER JOIN is_in i ON h.name = i.hospital_name
                            INNER JOIN borough b ON i.bor_name = b.bor_name
                        ORDER BY b.bor_name, h.name";

                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                echo "There are " . $queryResult . " hospitals";
                if ($queryResult > 0) {
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Borough</th>
                                    <td>Directions</td>
                                </tr>
                            </thead>
                            <tbody>";

                    $prevBorough = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $currBorough = $row['bor_name'];
                        if ($currBorough !== $prevBorough) {
                            echo "<tr><td colspan='4'><h1>$currBorough</h1></td></tr>";
                            $prevBorough = $currBorough;
                        }
                        echo "<tr>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td>" . $row['bor_name'] . "</td>
                                <td><a href='direction_map.php?lat=" . urlencode($row['lat']) . "&lng=" . urlencode($row['lng']) . "'><button>Directions</button></a></td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No results";
                }
                ?>
            </div>

        </div>
    </div>
</main>
<script src="script.js"></script>
</body>

</html>