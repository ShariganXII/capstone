<?php
include 'header.php';
?>
<main class="map-main">
    <div class="map-container">
        <div id="floating-panel">
            <b>Mode of Travel: </b>
            <select id="mode">
                <option value="DRIVING">Driving</option>
                <option value="WALKING">Walking</option>
                <option value="BICYCLING">Bicycling</option>
                <option value="TRANSIT">Transit</option>
            </select>
        </div>
        <div id="map"></div>
        <div id="sidebar"></div>
    </div>

</main>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHbWUx1VLSARPGsYrr_sWlR_f_roMwIpw&callback=initMap&v=weekly"
    defer></script>
</script>
<script src="js/directions.js"></script>
<footer></footer>
</body>

</html>