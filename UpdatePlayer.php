<?php
include "config.php";

$player = null;
$searchError = "";

// Check if the search form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $Name = $_POST['Name'];

    // Search for player by name
    $searchQuery = "SELECT * FROM player WHERE Name = ?";
    if ($stmt = mysqli_prepare($connect, $searchQuery)) {
        mysqli_stmt_bind_param($stmt, "s", $Name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            // Store the fetched player data in $player
            $player = $row;
        } else {
            $searchError = "Player not found.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSTTC - Update Player</title>
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

    <link rel="stylesheet" href="header&footerAdmin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right, black, gold);
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #1a1c35;
            padding: 20px 40px;
            border-radius: 20px;
            display: inline-block;
            width: 80%;
            max-width: 1200px;
        }

        .btnSearch {
            border-radius: 30px;
            width: 150px;
            height: 40px;
            background-color: #0097b2;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .btnUpdate {
            border-radius: 40px;
            width: 200px;
            height: 50px;
            background-color: #0097b2;
            text-align: center;
            margin-top: 20px;
            color: white;
            border: none;
            cursor: pointer;
        }

        input, textarea, select {
            width: 90%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .form-group label {
            flex: 0 0 20%;
            text-align: left;
        }

        .form-group input, .form-group select {
            flex: 1;
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        .form-inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .form-inline .form-group {
            flex: 1;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <div class="navbar-brand img" href="">
        <img src="MsttcLogo-1.png" alt="Club Logo" />
      </div>
        <!-- Center the navbar links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Home Icon -->
                <li class="nav-item">
                    <a class="nav-link" href="Admin.html">
                        <i class="bi bi-house-fill" style="font-size: 25px; color: whitesmoke;">Home Admin</i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PLAYER
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="RegistrationPlayer.php">Add Player</a></li>
                        <li><a class="dropdown-item" href="UpdatePlayer.php">Update Player</a></li>
                        <li><a class="dropdown-item" href="DeletePlayer.php">Delete Player</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        NEWS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="newsDropdown">
                        <li><a class="dropdown-item" href="RegistrationNews.php">Add News</a></li>
                        <li><a class="dropdown-item" href="UpdateNews.php">Update News</a></li>
                        <li><a class="dropdown-item" href="DeleteNews.php">Delete News</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="tournamentDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        TOURNAMENT
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="tournamentDropdown">
                        <li><a class="dropdown-item" href="RegistrationTournament.php">Add Tournament</a></li>
                        <li><a class="dropdown-item" href="UpdateTournament.php">Update Tournament</a></li>
                        <li><a class="dropdown-item" href="DeleteTournament.php">Delete Tournament</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ABOUT US
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="#">Add YT Link</a></li>
                        <li><a class="dropdown-item" href="#">Update YT Link</a></li>
                        <li><a class="dropdown-item" href="#">Delete YT Link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card">
        <h1>Update Player</h1>
        <!-- Search Form -->
        <form method="post" id="searchForm" action="UpdatePlayer.php">
            <label for="Name">Enter Player Name :</label><br>
            <input type="text" name="Name" id="Name" value="<?php echo isset($Name) ? htmlspecialchars($Name) : ''; ?>" required><br>
            <button type="submit" name="search" class="btnSearch">SEARCH</button>
        </form>

        <?php if (!empty($searchError)): ?>
            <p style="color: red;"><?php echo $searchError; ?></p>
        <?php endif; ?>

        <div class="image-container">
            <img id="playerImage" src="<?php echo isset($player['ImagePlayer']) ? htmlspecialchars($player['ImagePlayer']) : ''; ?>"width="300">
        </div>
        <br>  

        <?php if ($player): ?>
            <form action="inputUpdatePlayer.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="IdPlayer" value="<?php echo htmlspecialchars($player['IdPlayer']); ?>">

                <div class="form-group">
                    <label for="Name">NAME</label>
                    <input type="text" name="Name" id="Name" value="<?php echo htmlspecialchars($player['Name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="NickName">NICKNAME</label>
                    <input type="text" name="NickName" id="NickName" value="<?php echo htmlspecialchars($player['NickName']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="Age">AGE</label>
                    <input type="number" name="Age" id="Age" value="<?php echo htmlspecialchars($player['Age']); ?>" required>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="DominantHand">DOMINANT HAND</label>
                        <select name="DominantHand" id="DominantHand" required>
                            <option value="Left" <?php echo ($player['DominantHand'] === 'Left') ? 'selected' : ''; ?>>Left</option>
                            <option value="Right" <?php echo ($player['DominantHand'] === 'Right') ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="Playstyle">PLAYSTYLE</label>
                        <select name="Playstyle" id="Playstyle" required>
                            <option value="The Aggressor" <?php echo ($player['Playstyle'] === 'The Aggressor') ? 'selected' : ''; ?>>The Aggressor</option>
                            <option value="The Controller" <?php echo ($player['Playstyle'] === 'The Controller') ? 'selected' : ''; ?>>The Controller</option>
                            <option value="The All-Rounder" <?php echo ($player['Playstyle'] === 'The All-Rounder') ? 'selected' : ''; ?>>The All-Rounder</option>
                            <option value="The Brick Wall" <?php echo ($player['Playstyle'] === 'The Brick Wall') ? 'selected' : ''; ?>>The Brick Wall</option>
                            <option value="The Defender" <?php echo ($player['Playstyle'] === 'The Defender') ? 'selected' : ''; ?>>The Defender</option>
                        </select>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="Blade">BLADE</label>
                        <input type="text" name="Blade" id="Blade" value="<?php echo htmlspecialchars($player['Blade']); ?>" required>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="RubberForeHand">RUBBER FOREHAND</label>
                        <input type="text" name="RubberForeHand" id="RubberForeHand" value="<?php echo htmlspecialchars($player['RubberForeHand']); ?>" required>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="RubberBackHand">RUBBER BACKHAND</label>
                        <input type="text" name="RubberBackHand" id="RubberBackHand" value="<?php echo htmlspecialchars($player['RubberBackHand']); ?>" required>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="Grip">GRIP</label>
                        <select name="Grip" id="Grip" required>
                            <option value="Penhold" <?php echo ($player['Grip'] === 'Penhold') ? 'selected' : ''; ?>>Penhold</option>
                            <option value="Shakehand" <?php echo ($player['Grip'] === 'Shakehand') ? 'selected' : ''; ?>>Shakehand</option>
                        </select>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label for="RatingPoint">UPDATE POINT</label>
                        <select name="RatingPoint" id="RatingPoint">
                            <option value="">Select Tournament Grade</option>
                            <option value="A" <?php echo ($player['RatingPoint'] === 'A') ? 'selected' : ''; ?>>A</option>
                            <option value="B" <?php echo ($player['RatingPoint'] === 'B') ? 'selected' : ''; ?>>B</option>
                            <option value="C" <?php echo ($player['RatingPoint'] === 'C') ? 'selected' : ''; ?>>C</option>
                        </select>
                    </div>
                </div>

                <!-- Picture section moved below the Update Point section -->
                <div class="form-group">
                    <label for="ImagePlayer">PICTURE</label><br>
                    <input type="file" name="ImagePlayer" id="ImagePlayer">
                </div>

                <!-- Centering the Update Button -->
                <div style="text-align: center;">
                    <button type="submit" name="update" class="btnUpdate">UPDATE</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
