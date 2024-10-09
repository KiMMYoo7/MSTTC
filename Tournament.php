<?php
include 'config.php'; // Include the database connection

// SQL query to select tournament data
$sql = "SELECT IdTournament, TournamentTitle, TournamentPlace, TournamentDate, TournamentImage, TournamentLinkDetails FROM tournament"; // Adjust the table name and fields as necessary
$result = $connect->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSTTC - Tournament</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- FontAwesome for icons (optional) -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <link rel="stylesheet" href="header&footer.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right, black, #d6b400);
        }


        .container {
            color: white;
            text-align: center;
            padding: 0px 0;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 150%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-content {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .card-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .card-label {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .card-info {
            font-size: 16px;
            color: #777;
            margin-bottom: 15px;
        }

        .card-link {
            color: #007bff;
            font-size: 16px;
            background-color: gold;
            border: none;
            text-decoration: none;
            cursor: pointer;
            border-radius: 10px;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }

        .card-link:hover {
            background-color: darkgoldenrod;
            transform: scale(1.35);
        }

        .countdown-timer {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 16px;
        }

    </style>
</head>

<body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-custom ">
    <div class="container-fluid">
      <!-- Club Brand Logo with link to the main page -->
      <a class="navbar-brand" href="MainPage.php">
        <img src="MsttcLogo-1.png" alt="Club Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="MainPage.php">News & Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Ranking.php">Ranking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Player.php">Player</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="Tournament.php">Tournament</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUs.php">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<h1 style="text-align: center;  color: white;">LATEST TOURNAMENT</h1>

<div class="container">
    <div class="row"> <!-- Bootstrap grid -->
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                
                <div class="col-md-4"> <!-- Column for card -->
                    <div class="card">
                        <div class="countdown-timer" id="countdown">00d 00h 00m 00s</div> <!-- Countdown Timer -->
                        <img src="uploads<?php echo $row['TournamentImage']; ?>" alt="Tournament Image"> <!-- Dynamic image -->
                        <div class="card-content">
                            <h1 class="card-title"><?php echo $row['TournamentTitle']; ?></h1> <!-- Dynamic title -->
                            <div class="card-label"><?php echo $row['TournamentDate']; ?></div> <!-- Dynamic date -->
                            <div class="card-info"><?php echo $row['TournamentPlace']; ?></div> <!-- Dynamic place -->
                            <button class="card-link" onclick="window.open('<?php echo $row['TournamentLinkDetails']; ?>', '_blank')">More Info</button> <!-- Dynamic link -->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="color: white;">No tournaments available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="MainPage.php" class="quick-link">News & Update</a></li>
                    <li><a href="Ranking.php" class="quick-link">Ranking</a></li>
                    <li><a href="Player.php" class="quick-link">Player</a></li>
                    <li><a href="Tournament.php" class="quick-link">Tournament</a></li>
                    <li><a href="AboutUs.php" class="quick-link">About Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center">
                <h5>Social Links</h5>
                <a href="https://www.facebook.com/msttc.madzam.shah.table.tannis.club" class="text-white me-2 facebook-link" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://wa.me/60129612701?text=Hello%20I%20am%20interested%20to%20know%20about%20MSTTC" class="text-white whatsapp-link" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <br>
                
            
            </div>
            <div class="col-md-4 text-center">
                <h5>Welcome to MSTTC !</h5>
                <p>Muadzam Shah, Rompin, Pahang, Malaysia</p>
                <div style="max-width: 600px; margin: 0 auto;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15951.104868725467!2d103.0612896!3d3.0678269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cf09add5ed2bc3%3A0xf8c2acc1d6bdc760!2sPING%20PONG%20ARENA%20MUADZAM%20SHAH!5e0!3m2!1sen!2smy!4v1695867544326!5m2!1sen!2smy"
                        width="400px"
                        height="200px"
                        style="border:4px gold; "
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
        
                <a href="https://www.google.com/maps/place/PING+PONG+ARENA+MUADZAM+SHAH/@3.0676762,103.0612896,15.35z/data=!4m10!1m2!2m1!1smuadzam+shah+table+tennis+club!3m6!1s0x31cf09add5ed2bc3:0xf8c2acc1d6bdc760!8m2!3d3.0678269!4d103.070096!15sCh5tdWFkemFtIHNoYWggdGFibGUgdGVubmlzIGNsdWKSAQtzcG9ydHNfY2x1YuABAA!16s%2Fg%2F11s1w2s29b?authuser=0&entry=ttu&g_ep=EgoyMDI0MDkyMy4wIKXMDSoASAFQAw%3D%3D"
                target="_blank" 
                class="btn btn-primary mt-3" 
                style=" font-size: 100%; text-decoration: none; border-radius: 5px; margin-top: 10px; height: 40px;">
                    View on Google Maps
                </a><br>
                            
            </div>
            <hr style="margin-top: 14px;">
            <p style="text-align: center; margin-bottom: 30px;">&copy; 2024 MSTTC. All rights reserved.</p>

        </div>
    </div>
</footer>

  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
