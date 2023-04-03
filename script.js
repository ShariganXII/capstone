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
var user_coord = document.getElementsByClassName("coord");

function getLocation(callback) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            if (typeof callback === 'function') {
                callback({ latitude, longitude });
            }
        });
    } else {
        user_coord.innerHTML = "Geolocation is not supported by this browser.";
    }
}

//   Define the array of locations
//   var locations = [{lat:40.7390729,lng:-73.9750165},{lat:40.8434675,lng:-73.9110798},{lat:40.8315806,lng:-73.9023625},{lat:40.6549132,lng:-73.9126971},{lat:40.691265,lng:-73.9777743},{lat:40.6466634,lng:-74.0209235},{lat:40.8480939,lng:-73.8438705},{lat:40.7671513,lng:-73.9508035},{lat:40.7528689,lng:-73.9060948},{lat:40.7556207,lng:-73.8156366},{lat:40.8142287,lng:-73.9396101},{lat:40.803111,lng:-73.9410773},{lat:40.7649072,lng:-73.9523764},{lat:40.6783744,lng:-73.9374075},{lat:40.854072,lng:-73.8469},{lat:40.7014063,lng:-73.816302},{lat:40.6568816,lng:-73.9447075},{lat:40.6599813,lng:-73.9325378},{lat:40.7378,lng:-74.0009},{lat:40.7737396,lng:-73.9607378},{lat:40.8160855,lng:-73.9247762},{lat:40.7290234,lng:-73.8502948},{lat:40.7556629,lng:-73.7074216},{lat:40.639262,lng:-73.9981537},{lat:40.6138176,lng:-73.948454},{lat:40.7644528,lng:-73.9570196},{lat:40.7852328,lng:-73.945029},{lat:40.8485983,lng:-73.8461914},{lat:40.8809452,lng:-73.8807273},{lat:40.840367,lng:-73.8484472},{lat:40.8933423,lng:-73.861111},{lat:40.73266,lng:-73.9816},{lat:40.6187604,lng:-73.9428238},{lat:40.7888848,lng:-73.9540435},{lat:40.7682529,lng:-73.9247495},{lat:40.8052837,lng:-73.9617846},{lat:40.7696971,lng:-73.9868672},{lat:40.7319493,lng:-73.9845869},{lat:40.65076,lng:-73.94666},{lat:40.7648862,lng:-73.9557336},{lat:40.8733663,lng:-73.9131104},{lat:40.8412426,lng:-73.9409706},{lat:40.7647771,lng:-73.9548007},{lat:40.7101615,lng:-74.0047394},{lat:40.740341,lng:-73.824982},{lat:40.8805144,lng:-73.8815165},{lat:40.5850562,lng:-73.9654605},{lat:40.6901385,lng:-73.9979241},{lat:40.6466634,lng:-74.0209235},{lat:40.7421225,lng:-73.9739642},{lat:40.7343534,lng:-73.9829855},{lat:40.7168484,lng:-73.8043186},{lat:40.6356701,lng:-74.105827},{lat:40.7620682,lng:-73.9567885},{lat:40.6226149,lng:-74.0754956},{lat:40.8533764,lng:-73.8907008},{lat:40.5985989,lng:-73.7535776},{lat:40.5848868,lng:-74.0860039},{lat:40.5167578,lng:-74.1963791},{lat:40.6550034,lng:-73.9442519},{lat:42.6566685,lng:-73.7487353},{lat:40.704082,lng:-73.9177493}];

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

    for (var i = 0; i < locationsArray.length; i++) {
      var lat = parseFloat(locationsArray[i].lat);
      var lng = parseFloat(locationsArray[i].lng);
      var address = locationsArray[i].address;
      var name = locationsArray[i].name;
      var content = name + " " + address;
      var latlngset = new google.maps.LatLng(lat, lng);

      createMarker(latlngset, map, content);
    };
  };

  // Create a new function to handle marker and infowindow creation
  function createMarker(latlngset, map, content) {
    var marker = new google.maps.Marker({
      position: latlngset,
      map: map,
    });

    var infowindow = new google.maps.InfoWindow({
      content: content,
    });

    marker.addListener("click", () => {
      infowindow.open(map, marker);
    });
  };

  initMap();
});
