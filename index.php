<?php
include 'header.php';
?>

<main class="index-main">
    <div class='box-container'>
        <div class='wrapper'>
            <form action="search2.php" method="POST" class='index-form'>

                <div class="location-box">
                    <label for="location">Location</label>
                    <input type="text" name="bor" placeholder="Enter borough" required>
                </div>

                <div class="desig-box">
                    <label for="Designation Type">Designation Type</label>
                    <select id="Designation Type" name="desig">
                        <option value=""></option>
                        <option value="AIDS Center">AIDS Center</option>
                        <option value="Burn Center">Burn Center</option>
                        <option value="Perinatal Center">Perinatal Center</option>
                        <option value="SAFE Designated Hospital">SAFE Designated Hospital</option>
                        <option value="Stroke Center">Stroke Center</option>
                        <option value="Trauma Center">Trauma Center</option>
                    </select>
                </div>
                <div class="service-box">
                    <label for="Service Type">Service</label>
                    <select id="Service Type" name="service">
                        <option value=""></option>
                        <option value="Ambulatory Surgery - Multi Specialty">Ambulatory Surgery - Multi Specialty
                        </option>
                        <option value="Cardiac Catheterization - Adult Diagnostic">Cardiac Catheterization - Adult
                            Diagnostic</option>
                        <option value="Cardiac Catheterization - Electrophysiology (EP)">Cardiac Catheterization -
                            Electrophysiology (EP)</option>
                        <option value="Cardiac Catheterization - Percutaneous Coronary Intervention (PCI)">Cardiac
                            Catheterization - Percutaneous Coronary Intervention (PCI)</option>
                        <option value="Clinic Part Time Services">Clinic Part Time Services</option>
                        <option value="Dental O/P">Dental O/P</option>
                        <option value="Emergency Department">Emergency Department</option>
                        <option value="Lithotripsy">Lithotripsy</option>
                        <option value="Magnetic Resonance Imaging">Magnetic Resonance Imaging</option>
                        <option value="Maternity">Maternity</option>
                        <option value="Medical Services - Other Medical Specialties">Medical Services - Other Medical
                            Specialties</option>
                        <option value="Medical Services - Primary Care">Medical Services - Primary Care</option>
                        <option value="Radiology-Therapeutic">Radiology-Therapeutic</option>
                        <option value="Renal Dialysis - Acute">Renal Dialysis - Acute</option>
                        <option value="Certified Mental Health Services O/P">Certified Mental Health Services O/P
                        </option>
                        <option value="Chemical Dependence - Rehabilitation O/P">Chemical Dependence - Rehabilitation
                            O/P</option>
                        <option value="Chemical Dependence - Withdrawal O/P">Chemical Dependence - Withdrawal O/P
                        </option>
                        <option value="Comprehensive Psychiatric Emergency Program">Comprehensive Psychiatric Emergency
                            Program</option>
                        <option value="Cardiac Surgery - Adult">Cardiac Surgery - Adult</option>
                        <option value="Transplant - Kidney">Transplant - Kidney</option>
                        <option value="Transplant - Liver">Transplant - Liver</option>
                        <option value="Chemical Dependence - Rehabilitation">Chemical Dependence - Rehabilitation
                        </option>
                        <option value="Methadone Maintenance O/P">Methadone Maintenance O/P</option>
                        <option value="Traumatic Brain Injury Program">Traumatic Brain Injury Program</option>
                        <option value="Renal Dialysis - Chronic">Renal Dialysis - Chronic</option>
                        <option value="Lithotripsy O/P">Lithotripsy O/P</option>
                        <option value="Epilepsy Comprehensive Services">Epilepsy Comprehensive Services</option>
                        <option value="Cardiac Catheterization - Pediatric Diagnostic">Cardiac Catheterization -
                            Pediatric Diagnostic</option>
                        <option value="Cardiac Catheterization - Pediatric Intervention Elective">Cardiac
                            Catheterization - Pediatric Intervention Elective</option>
                        <option value="Cardiac Surgery - Pediatric">Cardiac Surgery - Pediatric</option>
                        <option value="Transplant - Heart - Adult">Transplant - Heart - Adult</option>
                        <option value="Transplant - Heart - Pediatric">Transplant - Heart - Pediatric</option>
                        <option value="Radiology-Therapeutic O/P">Radiology-Therapeutic O/P</option>
                        <option value="Home Hemodialysis Training and Support">Home Hemodialysis Training and Support
                        </option>
                        <option value="Home Peritoneal Dialysis Training and Support">Home Peritoneal Dialysis Training
                            and Support</option>
                    </select>
                </div>

                <div class="submit-button">
                    <button type="submit" name="submit-search">submit</button>
                </div>
            </form>
        </div>
    </div>


    <!-- <div class="container">
        <?php
        // $sql = "SELECT * FROM hospital";
        // $result = mysqli_query($conn, $sql);
        // $queryResults = mysqli_num_rows($result);
        
        // if ($queryResults > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         echo "<div
        //             <h3>" . $row['name'] . "</h3>
        //             <p>" . $row['location'] . "</p>
        //             </div>";
        //     }
        // }
        ?>
    </div> -->
</main>
</body>

</html>