<?php
include 'db\db.php';
include 'key.php';
session_start();

$addr_set = false;
if (isset($_POST['address-input'])) {
    $_SESSION['address'] = $_POST['address-input'];
    $addr_set = true;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="node_modules\normalize.css\normalize.css"> -->
    <link rel="stylesheet" href="node_modules\milligram\dist\milligram.css" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey ?>&libraries=places&callback=init">
    </script>
    <title>ISI490 Capstone</title>
</head>

<body>
    <header>
        <div class="nav">
            <nav>
                <div class="logo">
                    <img src="images\logo.jpeg" alt="logo" />
                </div>
                <div id="change-address-box">
                    <button type="button" id="change-address-button" onclick="displayAddressBox()">
                        <div id="address-info">
                            <div id="your-address-with-button">
                                <p>Your Address</p>
                                <img src="images/edit.png" alt="edit button">
                            </div>
                            <p id="address"></p>
                        </div>
                    </button>
                </div>

                <div class="address-box" style=" display: none">
                    <form method="POST" class='addr-form'">
                        <label for=" address-input">Enter Address</label>
                        <input type="text" id="address-input" name="address-input" placeholder="Search" />
                        <button type="submit" name="addr-submit" onclick="displayAddressBox()">Submit</button>
                    </form>
                </div>

                <div class="nav-links">
                    <ul>
                        <li><a href="index.php" id="menu-index">Home</a></li>
                        <li class="dropdown">
                            <a class="toggle" href="#" id="menu-dropdown">
                                Hospitals
                                <img class="arrow" src="images/dropdown-arrow.png" alt="down-arrow" />
                            </a>
                            <ul class="dropdown-content">
                                <li><a href="map.php" id="menu-map">View Map</a></li>
                                <li>
                                    <a href="full_list.php" id="menu-list">View Full List</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="analytics.php" id="menu-analytics">Analytics</a></li>
                        <li><a href="doc.php" id="menu-doc">Documentation</a></li>
                    </ul>
                </div>
            </nav>

        </div>

    </header>
</body>

</html>