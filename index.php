<?php
include 'header.php';
$submitted = false; 
if (isset($_POST['submit-search'])) {
    $submitted = true; 
}
?>

<main class="index-main">

    <!-- <div class="box-container">
        <div class="wrapper">

            <div class="coord">
                <button class="get-coord" type="button" onclick="getLocation()">
                    <img class="coord-icon" src="images/location-icon.png" alt="get coordinates">
                    Use my Location
                </button>
            </div>

        </div>
    </div> -->

    <div class='box-container'>
        <div class='wrapper'>
            <div class="index-text-box">
                <h1>Find Hospital</h1>
                <p>Search for a hospital by borough, designation type, service type, or others.</p>
            </div>
            <form method="POST" class="index-form" id="index-form">
                <div class="location-box">
                    <input type="text" list="tests" id="location-box" name="bor" placeholder="Enter borough" required />
                    <datalist id="tests">
                        <option value="Bronx">
                        <option value="Brooklyn">
                        <option value="Manhattan">
                        <option value="Queens">
                        <option value="Staten Island">
                    </datalist>
                    <img src="images/search.png" alt="search" />
                </div>

                <div class="advanced-search-box">
                    <span>Advanced Search</span>
                    <div class="advanced-search">
                        <div class="desig-box">
                            <label for="Designation Type">Designation Type</label>
                            <select id="Designation Type" name="desig">
                                <option value=""></option>
                                <option value="AIDS Center">AIDS Center</option>
                                <option value="Burn Center">Burn Center</option>
                                <option value="Perinatal Center">Perinatal Center</option>
                                <option value="SAFE Designated Hospital">
                                    SAFE Designated Hospital
                                </option>
                                <option value="Stroke Center">Stroke Center</option>
                                <option value="Trauma Center">Trauma Center</option>
                            </select>
                        </div>

                        <div class="service-box">
                            <label for="Service Type">Service</label>
                            <select id="Service Type" name="service">
                                <option value=""></option>
                                <option value="Ambulatory Surgery - Multi Specialty">
                                    Ambulatory Surgery - Multi Specialty
                                </option>
                                <option value="Cardiac Catheterization - Adult Diagnostic">
                                    Cardiac Catheterization - Adult Diagnostic
                                </option>
                                <option value="Cardiac Catheterization - Electrophysiology (EP)">
                                    Cardiac Catheterization - Electrophysiology (EP)
                                </option>
                                <option value="Cardiac Catheterization - Percutaneous Coronary Intervention (PCI)">
                                    Cardiac Catheterization - Percutaneous Coronary
                                    Intervention (PCI)
                                </option>
                                <option value="Clinic Part Time Services">
                                    Clinic Part Time Services
                                </option>
                                <option value="Dental O/P">Dental O/P</option>
                                <option value="Emergency Department">
                                    Emergency Department
                                </option>
                                <option value="Lithotripsy">Lithotripsy</option>
                                <option value="Magnetic Resonance Imaging">
                                    Magnetic Resonance Imaging
                                </option>
                                <option value="Maternity">Maternity</option>
                                <option value="Medical Services - Other Medical Specialties">
                                    Medical Services - Other Medical Specialties
                                </option>
                                <option value="Medical Services - Primary Care">
                                    Medical Services - Primary Care
                                </option>
                                <option value="Radiology-Therapeutic">
                                    Radiology-Therapeutic
                                </option>
                                <option value="Renal Dialysis - Acute">
                                    Renal Dialysis - Acute
                                </option>
                                <option value="Certified Mental Health Services O/P">
                                    Certified Mental Health Services O/P
                                </option>
                                <option value="Chemical Dependence - Rehabilitation O/P">
                                    Chemical Dependence - Rehabilitation O/P
                                </option>
                                <option value="Chemical Dependence - Withdrawal O/P">
                                    Chemical Dependence - Withdrawal O/P
                                </option>
                                <option value="Comprehensive Psychiatric Emergency Program">
                                    Comprehensive Psychiatric Emergency Program
                                </option>
                                <option value="Cardiac Surgery - Adult">
                                    Cardiac Surgery - Adult
                                </option>
                                <option value="Transplant - Kidney">
                                    Transplant - Kidney
                                </option>
                                <option value="Transplant - Liver">
                                    Transplant - Liver
                                </option>
                                <option value="Chemical Dependence - Rehabilitation">
                                    Chemical Dependence - Rehabilitation
                                </option>
                                <option value="Methadone Maintenance O/P">
                                    Methadone Maintenance O/P
                                </option>
                                <option value="Traumatic Brain Injury Program">
                                    Traumatic Brain Injury Program
                                </option>
                                <option value="Renal Dialysis - Chronic">
                                    Renal Dialysis - Chronic
                                </option>
                                <option value="Lithotripsy O/P">Lithotripsy O/P</option>
                                <option value="Epilepsy Comprehensive Services">
                                    Epilepsy Comprehensive Services
                                </option>
                                <option value="Cardiac Catheterization - Pediatric Diagnostic">
                                    Cardiac Catheterization - Pediatric Diagnostic
                                </option>
                                <option value="Cardiac Catheterization - Pediatric Intervention Elective">
                                    Cardiac Catheterization - Pediatric Intervention Elective
                                </option>
                                <option value="Cardiac Surgery - Pediatric">
                                    Cardiac Surgery - Pediatric
                                </option>
                                <option value="Transplant - Heart - Adult">
                                    Transplant - Heart - Adult
                                </option>
                                <option value="Transplant - Heart - Pediatric">
                                    Transplant - Heart - Pediatric
                                </option>
                                <option value="Radiology-Therapeutic O/P">
                                    Radiology-Therapeutic O/P
                                </option>
                                <option value="Home Hemodialysis Training and Support">
                                    Home Hemodialysis Training and Support
                                </option>
                                <option value="Home Peritoneal Dialysis Training and Support">
                                    Home Peritoneal Dialysis Training and Support
                                </option>
                            </select>
                        </div>

                        <div class="radius-box">
                            <label for="radius">Mile Radius</label>
                            <select id="radius" name="radius">
                                <option value=""></option>
                                <option value="5">5 miles</option>
                                <option value="10">10 miles</option>
                                <option value="15">15 miles</option>
                                <option value="20">20 miles</option>
                                <option value="25">25 miles</option>
                                <option value="30">30 miles</option>
                            </select>
                        </div>

                        <div class="bed-box">
                            <label for="bed">Bed Available</label>
                            <select id="bed" name="bed">
                                <option value=""></option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="500">500</option>
                            </select>
                        </div>

                        <div class="rating-box">
                            <label for="rating">Rating</label>
                            <select id="rating" name="rating">
                                <option value=""></option>
                                <option value="1">1 star & up</option>
                                <option value="2">2 star & up</option>
                                <option value="3">3 star & up</option>
                                <option value="4">4 star & up</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="submit-button">
                    <button type="submit" name="submit-search" onclick="showSearchResult()">
                        submit
                    </button>
                </div>
            </form>

            <?php if ($submitted) { ?>
            <hr>
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
                            $rating = mysqli_real_escape_string($conn, $_POST['rating']);
                            $lat = $_COOKIE["lat"];
                            $lng = $_COOKIE["lng"];
                            $bed = mysqli_real_escape_string($conn, $_POST['bed']);
                            $radius = mysqli_real_escape_string($conn, $_POST['radius']);
                            $query = "SELECT DISTINCT h.*, b.bor_name";
                            if ($radius) {
                                $query .= ", (3959 * acos(cos(radians($lat)) * cos(radians(h.lat)) 
                                        * cos(radians(h.lng) - radians($lng)) + sin(radians($lat)) 
                                        * sin(radians(h.lat)))) AS distance";
                            }
                            $query .= " FROM hospitals h
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
                            if (!empty($bed)) {
                                $query .= " AND h.beds >= '$bed'";
                            }
                            if (!empty($rating)) {
                                $query .= " AND h.rating >= '$rating'";
                            }
                            // Add the radius condition to the query if the radius is set
                            if ($radius) {
                                $query .= " HAVING distance <= $radius";
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
                                            <th>Beds</th>
                                            <th>Rating</th>
                                        </tr>
                                        </thead>
                                        <tbody>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['address'] . "</td>
                                            <td>" . $row['bor_name'] . "</td>
                                            <td>" . $row['beds'] . "</td>
                                            <td>" . $row['rating'] . "</td>
                                            <td><a href='direction_map.php?lat=" . urlencode($row['lat']) . "&lng=" . urlencode($row['lng']) . "'><button>Directions</button></a></td>
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
            <?php } ?>
        </div>
    </div>
    <script src="script.js"></script>
</main>
<footer></footer>

</body>

</html>