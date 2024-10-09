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
            min-height: 100vh; /* Ensure body takes full height */
            display: flex;
            flex-direction: column;
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
            flex: 1;
        }

        .container {
            background-size: cover;
            background-position: center;
            color:black;
            text-align: center;
            padding: 100px 0;
            position: relative;
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

        table {
            width: 100%;
            margin: 20px 0;
            background-color: #fff;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .rank {
            text-align: center;
        }

        .points {
            font-weight: bold;
        }

        .breakdown {
            text-align: center;
        }

        .breakdown img {
            width: 20px;
            cursor: pointer;
        }

        tr:hover {
            background-color: #f9f9f9;
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
                    <a class="nav-link active" aria-current="page" href="Ranking.php">RANKING</a>
                    <a class="nav-link" href="Player.php">PLAYER</a>
                    <a class="nav-link" href="Tournament.php">TOURNAMENTS</a>
                    <a class="nav-link" href="AboutUs.php">ABOUT US</a>
                </div>
        </div>
    </div>
</nav>
<div class="container">
    <table>
        <thead>
            <tr>
                <th class="rank">RANK</th>
                <th>NAME</th>
                <th class="text-center">TOURNAMENTS</th>
                <th class="points">POINTS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="rank">1</td>
                <td><a href="PlayerProfileMenSingle.html"><strong>AHMAD A</strong></a></td>
                <td class="text-center">18</td>
                <td class="points">102,415</td>
            </tr>
            <tr>
                <td class="rank">2</td>
                <td><a href="PlayerProfileMenSingle.html"><strong>AHMAD B</strong></a></td>
                <td class="text-center">14</td>
                <td class="points">96,590</td>
            </tr>
            <tr>
                <td class="rank">3</td>
                <td><a href="PlayerProfileMenSingle.html"><strong>AHMAD C</strong></a></td>
                <td class="text-center">17</td>
                <td class="points">83,797</td>
            </tr>
            <tr>
                <td class="rank">4</td>
                <td><a href="#"><strong>AHMAD D</strong></a></td>
                <td class="text-center">23</td>
                <td class="points">83,716</td>
            </tr>
            <tr>
                <td class="rank">5</td>
                <td><a href="#"><strong>AHMAD E</strong></a></td>
                <td class="text-center">18</td>
                <td class="points">82,996</td>
            </tr>
            <tr>
                <td class="rank">6</td>
                <td><a href="#"><strong>AHMAD F</strong></a></td>
                <td class="text-center">23</td>
                <td class="points">81,881</td>
            </tr>
            <tr>
                <td class="rank">7</td>
                <td><a href="#"><strong>AHMAD G</strong></a></td>
                <td class="text-center">21</td>
                <td class="points">79,297</td>
            </tr>
            <tr>
                <td class="rank">8</td>
                <td><a href="#"><strong>AHMAD H</strong></a></td>
                <td class="text-center">16</td>
                <td class="points">75,758</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Ensure footer is pushed to the bottom -->
<div class="content"></div>

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
