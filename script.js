// Get the current page URL
var currentPageUrl = window.location.href;

// Check each menu item to see if it corresponds to the current page
var menuItems = document.querySelectorAll('.nav-links a');
for (var i = 0; i < menuItems.length; i++) {
  var menuItem = menuItems[i];
  if (menuItem.href === currentPageUrl) {
    // If the menu item corresponds to the current page, add the "active" class to it
    menuItem.classList.add('active');
  }
}

// Display result table
function showSearchResult() {
  var searchDiv = document.querySelector('.index-search');
  searchDiv.style.display = 'flex';
  searchDiv.style.marginTop = '5rem';
}

// Get user coords
// var user_coord = document.getElementsByClassName("coord");
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

var locationsArray;

// Function to retrieve locations data
function getLocations(callback) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      locationsArray = JSON.parse(this.responseText);
      callback(locationsArray);
    }
  };
  xhttp.open("GET", "db/fetch_info.php", true);
  xhttp.send();
}

getLocations(function (locationsArray) {
  function initMap() {
    var center = { lat: 40.7128, lng: -74.0060 };
    var mapOption = {
      zoom: 11,
      center: center,
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOption);

    getLocation(function (coords) {
      createUserMarker(coords.latitude, coords.longitude, map);
    });

    for (var i = 0; i < locationsArray.length; i++) {
      var lat = parseFloat(locationsArray[i].lat);
      var lng = parseFloat(locationsArray[i].lng);
      var address = locationsArray[i].address;
      var name = locationsArray[i].name;
      var content = "<p>name: " + name + "</p>" +
      "<p>Address: " + address + "</p>" +
      "<a href='direction_map.php?lat=" + encodeURIComponent(lat) + "&lng=" + encodeURIComponent(lng) + "'><button>Directions</button></a>";
    
      var latlngset = new google.maps.LatLng(lat, lng);

      createMarker(latlngset, map, content);
    };
  };

  // Declare a variable to store the currently open InfoWindow outside the createMarker function
var currentInfoWindow = null;

function createMarker(latlngset, map, content) {
  var marker = new google.maps.Marker({
    position: latlngset,
    map: map,
  });

  var infowindow = new google.maps.InfoWindow({
    content: content,
  });

  marker.addListener("click", () => {
    // If the clicked marker's InfoWindow is already open, close it
    if (infowindow === currentInfoWindow) {
      infowindow.close();
      currentInfoWindow = null;
    } else {
      // If there's another open InfoWindow, close it
      if (currentInfoWindow) {
        currentInfoWindow.close();
      }

      // Open the clicked marker's InfoWindow and set it as the currentInfoWindow
      infowindow.open(map, marker);
      currentInfoWindow = infowindow;
    }
  });
}
function createUserMarker(lat, lng, map) {
  var userPosition = new google.maps.LatLng(lat, lng);
  const icon = {
    url: "images/user.png",
    scaledSize: new google.maps.Size(40, 40),
  }
  var marker = new google.maps.Marker({
    position: userPosition,
    map: map,
    title: "Your Location",
    icon: icon,
  });
  var infowindow = new google.maps.InfoWindow({
    content: "Your Location",
  });

  marker.addListener("click", () => {
    // If the clicked marker's InfoWindow is already open, close it
    if (infowindow === currentInfoWindow) {
      infowindow.close();
      currentInfoWindow = null;
    } else {
      // If there's another open InfoWindow, close it
      if (currentInfoWindow) {
        currentInfoWindow.close();
      }

      // Open the clicked marker's InfoWindow and set it as the currentInfoWindow
      infowindow.open(map, marker);
      currentInfoWindow = infowindow;
    }
  });
}
window.initMap = initMap;
});
