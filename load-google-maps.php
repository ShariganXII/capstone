<?php
    require_once 'config.php'; // Assuming you have stored the API key in a config.php file
    header('Content-Type: text/javascript'); // Set the content type to JavaScript
?>


(function() {
var script = document.createElement('script');
script.src = 'https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places&callback=init';
script.async = true;
script.defer = true;
document.body.appendChild(script);
})();