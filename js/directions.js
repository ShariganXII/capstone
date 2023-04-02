var urlParams = new URLSearchParams(window.location.search);
var lat = urlParams.get('lat');
var lon = urlParams.get('lon');

function initMap() {
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const directionsService = new google.maps.DirectionsService();
    var center = {lat: 40.7128, lng: -74.0060};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: center,
    });
    directionsRenderer.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsRenderer);
    document.getElementById("mode").addEventListener("change", () => {
      calculateAndDisplayRoute(directionsService, directionsRenderer);
    });
    directionsRenderer.setPanel(document.getElementById("sidebar"));
}
function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    const selectedMode = document.getElementById("mode").value;
    var selectedHospital = new google.maps.LatLng(lat, lon);
  
    // Get the user's current location
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  
        // Calculate the directions
        directionsService
          .route({
            origin: userLocation,
            destination: selectedHospital,
            travelMode: google.maps.TravelMode[selectedMode],
          })
          .then((response) => {
            directionsRenderer.setDirections(response);
          })
          .catch((e) => window.alert("Directions request failed due to " + e));
      });
    } else {
      alert('Geolocation is not supported by this browser.');
    }
  }
  
  window.initMap = initMap;
  