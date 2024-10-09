<?php
include 'config.php'; // Include the database connection

$sql = "SELECT IdPlayer, Name, NickName, Age, DominantHand, Playstyle, Blade, RubberForeHand, RubberBackHand, Grip, ImagePlayer FROM player"; // Your SQL query
$result = $connect->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSTTC</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(to right, black, gold);
           /* min-height: 100vh; /* Ensure body takes full height 
            display: flex;
            flex-direction: column;*/
        }

        .nav-link.active {
            color: #ff7f50 !important;
        }

        .nav-link {
            font-size: 24px;   
            color: #d6b400;
            margin-right: 60px; /* add a large gap between each link */
        }

        .navbar {
            background-color: #000; /* Set background to black */
        }

        /* Flexbox to keep footer at bottom */
        .content {
            
            border: red solid;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            border: red solid;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 40px 0;
        }

        .footer h5 {
            color: #ff7f50;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer a {
            color: #d6b400;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .copy {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 14px;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

                /* Player grid */
        /* Player grid */
        .player-grid {
            display: flex;
            justify-content: center;
            padding: 20px;
            border: red solid;
        }

        .player-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Creates 3 columns */
            gap: 50px; /* Adds space between the grid items */
            border: green solid;
        }

        .player-list a {
            text-align: center;
            color: #d6b400;
            text-decoration: none;
            font-size: 18px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden; /* To ensure the image and content are rounded */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Card shadow effect */
            transition: transform 0.2s; /* Smooth hover effect */
        }

        .player-list a:hover {
            color: #ff7f50;
            transform: scale(1.05); /* Scale up the card slightly on hover */
        }

        .player-list img {
            width: 100%;
            height: 300px; /* Fixed height */
            object-fit: cover; /* Ensures the image covers the card area without distortion */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-content {
            padding: 15px;
            
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
           
        }

        .dropdown-toggle {
        color: #FFD700; /* Gold text */
        background-color: black; /* Black button */
        border: none; /* Remove border */
        }

        .dropdown-menu {
        background-color: #f1f1f1; /* Light background for the dropdown */
        }

        .dropdown-item:hover {
        background-color: #ddd; /* Hover effect for dropdown items */
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="MSTTC LOGO.jpg" alt="Logo MSTTC" width="130" height="40">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="MainPage.php">NEWS & UPDATE</a> 
                    <a class="nav-link" href="Ranking.php">RANKING</a>
                    <a class="nav-link active" aria-current="page" href="Player.php">PLAYER</a>
                    <a class="nav-link" href="Tournament.php">TOURNAMENTS</a>
                    <a class="nav-link" href="AboutUs.php">ABOUT US</a>
                </div>
            </div>
        </div>
    </nav>

    <h1 style="text-align: center; padding: 20px; color: white;">PLAYER</h1>

        <!-- Player Grid Section -->
        <div class="player-grid" id="playerGrid">
            <!-- Men's Singles (default) -->
            <div id="mensSingle" class="player-list">
                <?php
                if ($result->num_rows > 0) {
                    // Fetch each row of the result set
                    while ($row = $result->fetch_assoc()) {
                        // Check if the player belongs to Men's Single category
                        //if ($row['Name'])  {
                            echo "<a href='PlayerProfileMenSingle.php?id=".$row["IdPlayer"]."' class='card'>";
                            echo '<img src="' . $row['ImagePlayer'] . '" alt="' . $row['Name'] . '">';
                            echo '<div class="card-content">';
                            echo '<p class="card-title">' . $row['Name'] . '</p>';
                            echo '</div>';
                            echo '</a>';
                       // }
                    }
                } else {
                    echo '<p>No players found.</p>';
                }
                ?>
            </div>
        </div>
    </div>

   

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="Prototype_MSTTCRS.html">News & Update</a></li>
                        <li><a href="ranking.html">Rankings</a></li>
                        <li><a href="#">Calendar</a></li>
                        <li><a href="#">Players</a></li>
                        <li> <a href="AdminLogin.html">Admin(Admin MSTTC only!)</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Platforms</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/msttc.madzam.shah.table.tannis.club">Facebook</a></li>
                        <li><a href="#">Whatsapp</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <p>Muadzam Shah, Rompin, Pahang,<br>Malaysia</p>
                </div>
            </div>
            <div class="copy">
                &copy; 2024 MSTTC. All rights reserved.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>