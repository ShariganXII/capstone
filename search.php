<?php
include('header.php')
    ?>

<main>
    <h1>Search Page</h1>
    <div class="search-container">
        <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM hospital WHERE location LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo "There are " . $queryResult . " results.";
            echo var_dump($search);
            if ($queryResult > 0) {
                echo "<table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                        </tr>
                        </thead>
                        <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['location'] . "</td>
                        </tr>";
                }
            } else {
                echo "No results";
            }
        }
        ?>
    </div>
</main>