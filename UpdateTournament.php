<?php
include "config.php";

$tournament = null;
$searchError = "";

// Check if the search form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $IdTournament = $_POST['IdTournament'];

    // Search for tournament by IdTournament
    $searchQuery = "SELECT * FROM tournament WHERE IdTournament = ?";
    if ($stmt = mysqli_prepare($connect, $searchQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $IdTournament);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            // Store the fetched tournament data in $tournament
            $tournament = $row;
        } else {
            $searchError = "Tournament not found.";
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
    <title>Update Tournament</title>

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
            max-width: 800px;
        }

        .btnSearch, .btnUpdate {
            border-radius: 30px;
            width: 150px;
            height: 40px;
            background-color: #0097b2;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        input, textarea, select {
            width: 90%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
            width: 100%;
        }

        .imgTournament {
            width: 300px;
            height: auto;
            border-radius: 10px;
            display: block;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
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
    <h1>Update Tournament</h1>

    <!-- Search Form -->
    <form method="post" id="searchForm" action="UpdateTournament.php">
        <label for="IdTournament" style="text-align: left;">ID TOURNAMENT</label>
        <input type="text" name="IdTournament" id="IdTournament" value="<?php echo isset($IdTournament) ? htmlspecialchars($IdTournament) : ''; ?>">
        <button type="submit" name="search" class="btnSearch">SEARCH</button>
    </form>

    <!-- Display error message if tournament not found -->
    <?php if (!empty($searchError)): ?>
        <p style="color: red;"><?php echo $searchError; ?></p>
    <?php endif; ?>

    <!-- Display update form if tournament is found -->
    <?php if ($tournament): ?>
        <form id="updateForm" method="POST" action="inputUpdateTournament.php" enctype="multipart/form-data">

            <input type="hidden" name="IdTournament" id="IdTournament" value="<?php echo htmlspecialchars($tournament['IdTournament']); ?>">

            <div class="form-group">
                <label for="TournamentTitle">Title</label><br>
                <input type="text" name="TournamentTitle" id="TournamentTitle" value="<?php echo htmlspecialchars($tournament['TournamentTitle']); ?>" required>
            </div>
            <div class="form-group">
                <label for="TournamentPlace">Place</label><br>
                <input type="text" name="TournamentPlace" id="TournamentPlace" value="<?php echo htmlspecialchars($tournament['TournamentPlace']); ?>" required>
            </div>
            <div class="form-group">
                <label for="TournamentDate">Date</label><br>
                <input type="date" name="TournamentDate" id="TournamentDate" value="<?php echo htmlspecialchars($tournament['TournamentDate']); ?>" required>
            </div>
            <div class="form-group">
                <label for="TournamentLinkDetails">Details Link</label>
                <input type="text" name="TournamentLinkDetails" id="TournamentLinkDetails" value="<?php echo htmlspecialchars($tournament['TournamentLinkDetails']); ?>" required>
            </div>
            <div class="form-group">
            <label for="TournamentImage">Tournament Image</label><br>
            <!-- Display the current image -->
            <?php if (!empty($tournament['TournamentImage'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($tournament['TournamentImage']); ?>" alt="Tournament Image" width="150"><br>
            <?php else: ?>
                <p>No image available.</p>
            <?php endif; ?>

            <!-- Optional file input for updating image -->
            <input type="file" name="TournamentImage" id="TournamentImage" accept="image/*">
        </div>
            <button type="submit" name="update" class="btnUpdate">UPDATE</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
