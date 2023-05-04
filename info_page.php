<?php
include 'header.php';
$name = htmlspecialchars($_GET["name"]);
$query1 = "SELECT DISTINCT de.des_name FROM hospitals h
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
            p.ser_name = s.ser_name
        WHERE h.name = '$name'";


$query2 = "SELECT DISTINCT s.ser_name FROM hospitals h
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
            p.ser_name = s.ser_name
        WHERE h.name = '$name'";


$query3 = "SELECT DISTINCT name, address, zip, phone, beds, lat, lng, rating, b.bor_name FROM hospitals h
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
            p.ser_name = s.ser_name
        WHERE h.name = '$name'";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);

?>

<main class="index-main">
    <div class="box-container">
        <div class="wrapper">
            <div class="info-wrapper">
                <div class="name-box">
                    <h1><?php echo $name ?></h1>
                    <img src="https://hhinternet.blob.core.windows.net/uploads/2023/01/nyc-health-hospitals-bellevue-awarded-1-million-in-recognition-of-outstanding-care-for-trauma-patient-featured.jpeg"
                        alt="hospital picture">
                    *not actual picture of hospital*
                </div>

                <div class="general-info-box">
                    <h1>Location Info</h1>
                    <?php
                    while ($row = mysqli_fetch_assoc($result3)) {
                        echo "<section class = 'info-address-box'>
                        <h2>Address</h2>
                        <p>". $row['address'] . "</p>
                        <p>". $row['zip'] . "</p>
                        <p>". $row['bor_name'] . "</p>
                        </section>";
                        
                        echo "<section class=phone-box>
                         <h2>Phone Number</h2>
                         <p>". $row['phone'] ."</p>
                        </section>";

                        echo "<section class=bed-box>
                         <h2>Beds</h2>
                         <p>". $row['beds'] ."</p>
                        </section>";

                        echo "<section class=rating-box>
                         <h2>Rating</h2>
                         <p>". $row['rating'] ."</p>
                        </section>";

                        echo "<a href='direction_map.php?lat=" . urlencode($row['lat']) . "&lng=" . urlencode($row['lng']) . "'><button>Directions</button></a>";
                    }
                    ?>
                </div>
                <div class="ser-box">
                    <h1>Services</h1>
                    <?php
                    while ($row = mysqli_fetch_assoc($result2)) {
                        echo $row['ser_name'];
                        echo "<br>";
                    }
                    ?>
                </div>

                <div class="des-box">
                    <h1>Designation</h1>
                    <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo $row['des_name'];
                        echo "<br>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <script src="script.js"></script>
</main>
</body>

</html>