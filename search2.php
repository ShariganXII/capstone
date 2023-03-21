<?php
include('header.php')
    ?>

<main>
    <div class="index-search">
        <div class="box-container">
            <div class="search-wrapper">
                <h1>Search Result</h1>
                <div class="result-box">
                    <?php
                    if (isset($_POST['submit-search'])) {
                        $bor = mysqli_real_escape_string($conn, $_POST['bor']);
                        $desig = mysqli_real_escape_string($conn, $_POST['desig']);
                        $service = mysqli_real_escape_string($conn, $_POST['service']);
                        $query =
                            "SELECT DISTINCT h.*, b.bor_name
                            FROM hospitals h
                            INNER JOIN is_in i ON h.name = i.hospital_name
                            INNER JOIN borough b ON i.bor_name = b.bor_name
                            INNER JOIN designated de ON h.name = de.hospital_name
                            INNER JOIN designations d ON de.des_name = d.des_name
                            INNER JOIN perform p ON h.name = p.hospital_name
                            INNER JOIN services s ON p.ser_name = s.ser_name
                            WHERE b.bor_name LIKE '%$bor%'";

                        if (!empty($service)) {
                            $query .= " AND s.ser_name = '$service'";
                        }
                        if (!empty($desig)) {
                            $query .= " AND d.des_name = '$desig'";
                        }
                        $result = mysqli_query($conn, $query);
                        $queryResult = mysqli_num_rows($result);
                        if ($queryResult > 0) {
                            echo "<table>
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Borough</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>" . $row['name'] . "</td>
                                        <td>" . $row['address'] . "</td>
                                        <td>" . $row['bor_name'] . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "No results";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</main>