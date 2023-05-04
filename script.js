function displayAddressBox() {
  var addressBox = document.querySelector('.address-box');
  if (addressBox.style.display === 'none' || addressBox.style.display === '') {
    addressBox.style.display = 'flex';
  } else {
    addressBox.style.display = 'none';
  }
}
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

// Add an event listener to the address form
document.querySelector('.addr-form').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the entered address
  const address = document.getElementById('address-input').value;

  // Store the address in local storage
  localStorage.setItem('enteredAddress', address);

  // Update the address displayed on the page
  updateAddressDisplay();
});

// Function to update the address from local storage
function updateAddressDisplay() {
  const storedAddress = localStorage.getItem('enteredAddress');
  if (storedAddress) {
    document.getElementById('address').textContent = storedAddress;
  }
  else{
    document.getElementById('address').textContent = 'No address entered';
  }
}

// Update the address when the page is loaded
document.addEventListener('DOMContentLoaded', updateAddressDisplay);

// Display result table
function showSearchResult() {
  var searchDiv = document.querySelector('.index-search');
  searchDiv.style.display = 'flex';
  searchDiv.style.marginTop = '5rem';
}

// // Get user coords
// function getLocation(callback) {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(function(position) {
//             var latitude = position.coords.latitude;
//             var longitude = position.coords.longitude;
//             if (typeof callback === 'function') {
//                 callback({ latitude, longitude });
//             }
//         },
//         function(error){
//             showError(error);
//         });
//     } else {
//         alert("Geolocation is not supported by this browser.") ;
//     }
// }
// function showError(error) {
//   switch(error.code) {
//     case error.PERMISSION_DENIED:
//       alert("User denied the request for Geolocation.")
//       break;
//     case error.POSITION_UNAVAILABLE:
//       alert("Location information is unavailable.")
//       break;
//     case error.TIMEOUT:
//       alert("The request to get user location timed out.")
//       break;
//     case error.UNKNOWN_ERROR:
//       alert("An unknown error occurred.")
//       break;
//   }
// }

// Autocomplete form
function initAutocomplete() {
  const input = document.getElementById('address-input');
  const nycBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(40.4774, -74.2589),
    new google.maps.LatLng(40.9176, -73.7004)
  );
  const options = {
      componentRestrictions: { country: 'us'},
      bounds: nycBounds,
      strictBounds: true,
  };
  const autocomplete = new google.maps.places.Autocomplete(input, options);

}

function init() {
  // Autocomplete form
  initAutocomplete();

  if(document.getElementById("map")) {
  // Retrieve locations data and initialize the map
  getLocations(function (locationsArray) {
    initMap(locationsArray);
  });
}
}

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

// Function to get coordinates from an address
async function getCoordinatesFromAddress(address) {
  const geocoder = new google.maps.Geocoder();
  return new Promise((resolve, reject) => {
    geocoder.geocode({ address: address }, (results, status) => {
      if (status === google.maps.GeocoderStatus.OK) {
        const lat = results[0].geometry.location.lat();
        const lng = results[0].geometry.location.lng();
        resolve({ lat, lng });
      } else {
        reject(`Geocoder failed due to: ${status}`);
      }
    });
  });
}

// Function to handle address submission
async function handleAddressSubmission() {
  const storedAddress = localStorage.getItem('enteredAddress');
  if (storedAddress) {
    try {
      const { lat, lng } = await getCoordinatesFromAddress(storedAddress);
      createUserMarker(lat, lng, map);

      // Store the latitude and longitude values in localStorage
      localStorage.setItem('storedLat', lat);
      localStorage.setItem('storedLng', lng);
    } catch (error) {
      console.error(error);
    }
  }
}

const storedLat = parseFloat(localStorage.getItem('storedLat'));
const storedLng = parseFloat(localStorage.getItem('storedLng'));
$(document).ready(function () {
    createCookie("lat", storedLat , "10");
    createCookie("lng", storedLng , "10");
});
   
// Function to create the cookie
function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";

}
var map;
if(document.getElementById("map")) {
  function initMap() {
    var center = { lat: 40.7128, lng: -74.0060 };
    var mapOption = {
      zoom: 11,
      center: center,
    };
    map = new google.maps.Map(document.getElementById("map"), mapOption);

    handleAddressSubmission();

    getLocations(function (locationsArray) {
      initializeMapWithData(locationsArray, map);
    });
    window.initMap = initMap;

  }
}

function initializeMapWithData(locationsArray, map) {
  for (var i = 0; i < locationsArray.length; i++) {
    var lat = parseFloat(locationsArray[i].lat);
    var lng = parseFloat(locationsArray[i].lng);
    var address = locationsArray[i].address;
    var name = locationsArray[i].name;
    var rating = locationsArray[i].rating;
    var content = "<div class = infowindow-box> <p>Name: " + name + "</p>" +
    "<p>Address: " + address + "</p>" +
    "<p>Rating: " + rating + "</p>" +
    "<a href='direction_map.php?lat=" + encodeURIComponent(lat) + "&lng=" + encodeURIComponent(lng) + "'><button>Directions</button></a>" +
    "<br>" +
    "<a href='info_page.php?name=" + encodeURIComponent(name) + "'target= _blank><button>More Info</button></a> </div>";

    var latlngset = new google.maps.LatLng(lat, lng);

    createMarker(latlngset, map, content);
  };
}

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