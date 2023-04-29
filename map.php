<?php
include 'header.php';

?>
<main class="map-main">
    <div id="map"></div>

</main>
<script>
function initMap() {
    var center = {
        lat: 40.7128,
        lng: -74.0060
    };
    var mapOption = {
        zoom: 11,
        center: center,
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOption);
}
</script>
<script src="script.js"></script>
<footer></footer>

</body>

</html>