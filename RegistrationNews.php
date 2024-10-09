<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MSTTC - Registration News</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <!-- FontAwesome for icons (optional) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="header&footerAdmin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background: linear-gradient(to right, black, gold);
    }

    h1 {
      color: white;
      text-align: center;
      margin-bottom: 30px;
      margin-top: 20px;
    }

    .card {
      position: relative;
      padding: 10px 10px 10px 30px;
      margin: 20px auto 50px auto;
      /* Center the card horizontally */
      border-radius: 15px;
      background-color: #1a1b34;

      max-width: 950px;
      /* Sets the max width for the card */
      width: 100%;
      /* Ensures responsiveness */
    }

    .col-form-label {
      color: white;
      margin-bottom: 50px;
      text-align: left;
    }

    .form-group {
      margin-bottom: 20px;
    }



    input,
    textarea {
      margin-bottom: 15px;
      margin-left: 20px;
      border: red solid;
      max-width: 700px;
      /* Smaller width for input and select fields */
      width: 100%;
      /* Ensures responsiveness */
    }

    .text-center {
      text-align: center;
    }

    .btn {
  position: relative;
  font-weight: 400;
  text-align: center;
  padding: 8px 15px; /* Adjusted padding for smaller size */
  font-size: 1.1rem; /* Slightly smaller font size */
  border-radius: 5px;
  background-color: #009E60;
  color: white;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease; 
  max-width: 180px; /* Smaller max-width for the button */
  width: 100%; /* Ensures responsiveness */
  height: 60px;

  margin: 0 auto 10px; /* Centers the button horizontally */
}


    .btn:hover {
      background-color: darkgreen;
      transform: scale(1.3);
      
    }

    .btn-lg {
      padding: 15px 30px;
      font-size: 1.25rem;
    }

    .btn-block {
      display: block;
      width: 100%;
    }
  </style>

  <script>
    function validateForm(event) {
      // Get form fields
      const NewsTitle = document.getElementById('name').value.trim();
      const ShortDescription = document.getElementById('short-description').value.trim();
      const NewsDescription = document.getElementById('description').value.trim();
      const NewsDate = document.getElementById('date').value;
      const NewsPicture = document.getElementById('news-picture').value;
      const NewsLink = document.getElementById('news-link').value.trim();

      // Check if any field is empty
      if (!NewsTitle) {
        alert('Please enter the news title.');
        event.preventDefault(); // Prevent form submission
        return false;
      }
      if (!ShortDescription) {
        alert('Please enter a short news description.');
        event.preventDefault();
        return false;
      }
      if (!NewsDescription) {
        alert('Please enter the full news description.');
        event.preventDefault();
        return false;
      }
      if (!NewsDate) {
        alert('Please select a news date.');
        event.preventDefault();
        return false;
      }
      if (!NewsPicture) {
        alert('Please upload a news picture.');
        event.preventDefault();
        return false;
      }
      if (!NewsLink) {
        alert('Please upload a news link.');
        event.preventDefault();
        return false;
      }
      // If everything is valid, form will submit automatically
    }
  </script>

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

  <form id="newsForm" action="inputRegistrationNews.php" method="post" onsubmit="validateForm(event)" enctype="multipart/form-data">
    <div class="container">
      <div class="card">
        <h1>REGISTRATION NEWS</h1>
        <div class="row mb-1">
          <!-- Hidden field for news ID -->
          <input type="hidden" name="IdNews" value="">

          <label for="name" class="col-sm-2 col-form-label">News Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="NewsTitle" value="" required>
          </div>

          <label for="short-description" class="col-sm-2 col-form-label">Short News Description</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="short-description" name="ShortDescription" rows="2" required></textarea>
          </div>

          <label for="description" class="col-sm-2 col-form-label">News Description</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="description" name="NewsDescription" rows="4" required></textarea>
          </div>

          <label for="date" class="col-sm-2 col-form-label mt-4">News Date</label>
          <div class="col-sm-10 col-form-label mt-4">
            <input type="date" class="form-control" id="date" name="NewsDate" value="" required>
          </div>

          <label for="news-picture" class="col-sm-2 col-form-label">News Picture</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" accept="image/*" id="news-picture" name="NewsPicture">
          </div>

          <label for="news-link" class="col-sm-2 col-form-label">News Link</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="news-link" name="NewsLink" rows="4" required></textarea>
          </div>
        </div>

        <div class="text-center">
          <button class="btn btn-dark btn-lg btn-block" type="submit">REGISTER</button>
        </div>
      </div>

    </div>
    </div>
  </form>
</body>

</html>