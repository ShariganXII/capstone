<?php
include 'db\db.php';
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
    <title>ISI490 Capstone</title>
</head>

<body>
    <header>
        <div class="nav">
            <nav>
                <div class="logo">
                    <img src="images\logo.jpeg" alt="logo" />
                </div>

                <div class="nav-links">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a class="toggle" href="index.php">
                                Hospitals
                                <img class="arrow" src="images/dropdown-arrow.png" alt="down-arrow" />
                            </a>
                            <ul class="dropdown-content">
                                <li><a href="maps.php">View Map</a></li>
                                <li><a href="full_list.php">View Full List</a></li>
                            </ul>
                        </li>
                        <li><a href="analytics.php">Analytics</a></li>
                        <li><a href="doc.php">Documentation</a></li>

                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>

</html>