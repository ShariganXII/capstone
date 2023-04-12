var urlParams = new URLSearchParams(window.location.search);
var lat = urlParams.get('lat');
var lng = urlParams.get('lng');

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
function getLocation(callback) {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
          if (typeof callback === 'function') {
              callback({ latitude, longitude });
          }
      },
      function(error){
          showError(error);
      });
  } else {
      alert("Geolocation is not supported by this browser.") ;
  }
}
function showError(error) {
switch(error.code) {
  case error.PERMISSION_DENIED:
    alert("User denied the request for Geolocation.")
    break;
  case error.POSITION_UNAVAILABLE:
    alert("Location information is unavailable.")
    break;
  case error.TIMEOUT:
    alert("The request to get user location timed out.")
    break;
  case error.UNKNOWN_ERROR:
    alert("An unknown error occurred.")
    break;
}
}
function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    const selectedMode = document.getElementById("mode").value;
    var selectedHospital = new google.maps.LatLng(lat, lng);
  
    // Get the user's current location
    getLocation(function(userCoords) {
      var userLocation = new google.maps.LatLng(userCoords.latitude, userCoords.longitude);
  
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
    }
  
  window.initMap = initMap;
  