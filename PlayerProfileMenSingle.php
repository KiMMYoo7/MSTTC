<?php
include 'config.php'; // Include the database connection

// Check if an IdPlayer is provided in the URL, and sanitize the input
$playerId = isset($_GET['id']) ? intval($_GET['id']) : 1; // Default to IdPlayer 1 if no id is passed

// SQL query to fetch the specific player's information based on IdPlayer
$sql = "SELECT IdPlayer, Name, NickName, Age, DominantHand, Playstyle, Blade, RubberForeHand, RubberBackHand, Grip, ImagePlayer 
        FROM player 
        WHERE IdPlayer = $playerId";
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .nav-link.active {
            color: #ff7f50;
        }

        .nav-link {
            font-size: 24px;
            color: #d6b400;
            margin-right: 60px;
        }

        .navbar {
            background-color: #000;
        }

        /* Flexbox to keep footer at bottom */
        .content {
            flex: 1;
        }

        .container {
            background-size: cover;
            background-position: center;
            color: white;
            text-align: left;
            padding: 50px 0;
            position: relative;
        }

        .profile-card {
            background-color: #1b1b33;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .profile-card img {
            max-width: 30%;
            height: auto;
            border-radius: 5px;
        }

        .profile-info {
            display: flex;
            align-items: center;
        }

        .profile-info h2 {
            color: #ffcc00;
            text-align: left;
        }

        .profile-info p {
            color: #ff6565;
            text-align: left;
        }

        .rating-point {
            color: #ffcc00;
            font-weight: bold;
        }

        .profile-details {
            margin-top: 20px;
        }

        /* Footer styling */
        .footer {
            background-color: black;
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
    </style>
</head>
<body>
    <!-- Navigation Bar -->
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

    <!-- Player Profile Cards -->
    <div class="container">
        <div class="profile-card" id="profileCard">
            <div class="profile-info">
            <?php
            // Check if there are results
            if ($result && $result->num_rows > 0) {
                // Loop through the results to display each player as a card with a link
                while ($row = $result->fetch_assoc()) {
                    // Start card content
                    echo "<a href='PlayerProfileMenSingle.php?id=".$row["IdPlayer"]."' class='card-content'>";

                    // Display the player's image
                    echo '<img src="' . htmlspecialchars($row['ImagePlayer']) . '" alt="' . htmlspecialchars($row['Name']) . '" style="width: 30%; height: auto; border-radius: 5px;">';
                    echo "<br>";
                    echo "<div>";
                    
                    // Display the player's name
                    echo '<h2 class="card-title" style="color: #ffcc00;">' . htmlspecialchars($row['Name']) . '</h2>';
                    
                    // Display the player's nickname
                    echo '<p>NICKNAME: <span style="color: #ff6565;">' . htmlspecialchars($row['NickName']) . '</span></p>';
                    
                    // Display the player's age
                    echo '<p>AGE: ' . htmlspecialchars($row['Age']) . '</p>';
                    
                    // Display the player's dominant hand
                    echo '<p>DOMINANT HAND: ' . htmlspecialchars($row['DominantHand']) . '</p>';
                    
                    // Display the player's playstyle
                    echo '<p>PLAYSTYLE: <span style="color: #ff6565;">' . htmlspecialchars($row['Playstyle']) . '</span></p>';
                    
                    // Display the player's blade
                    echo '<p>BLADE: ' . htmlspecialchars($row['Blade']) . '</p>';
                    
                    // Example rating
                    echo '<p>RATING POINT: <span style="color: #ff6565;">1024.15</span></p>';
                    
                    echo '</div>'; // Close the div for card content
                    echo '</a>'; // Close the anchor tag
                }
            } else {
                echo '<p>No players found.</p>'; // No results found
            }
            ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
                        <li><a href="AdminLogin.html">Admin (Admin MSTTC only!)</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Platforms</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/msttc.madzam.shah.table.tannis.club">Facebook</a></li>
                        <li><a href="#">WhatsApp</a></li>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Active Link Script -->
    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                document.querySelectorAll('.nav-link.active').forEach(el => el.classList.remove('active'));
                link.classList.add('active');
            });
        });
    </script>
</body>
</html>
