<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSTTC - About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- FontAwesome for icons (optional) -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="header&footer.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right, black, gold);
            /*min-height: 100vh;  Ensure body takes full height */

            flex-direction: column;
        }

        /* Flexbox to keep footer at bottom */
        .content {
            flex: 1;
        }

        .container {
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 0;
            position: relative;

        }

        h1,
        h2,
        h3 {
            color: #ff7f50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;

        }

        .hero-section {
            text-align: center;
            background-color: #ffcc00;
            padding: 80px 20px;
            margin-bottom: 40px;
            border-radius: 10px;
        }

        .hero-section h1 {
            font-size: 3rem;
            color: #222;
            margin-bottom: 10px;
        }

        .hero-sectionimage {
            width: 350px;
            /* Set the desired width */
            height: 110px;
            /* Maintain aspect ratio */
            margin-bottom: 10px;

        }

        .hero-section p {
            font-size: 1.2rem;
            color: #555;
        }

        .hero-h {
            color: #ff7f50;
            /* Applies the coral color to the text */
            font-size: 1.2rem;
            /* Optional: Adjusts the font size for better readability */

        }



        .mission-section {
            background-color: #fff;
            padding: 60px 20px;
            margin-bottom: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .mission-section h2 {
            font-size: 2rem;
            color: #222;
            margin-bottom: 20px;
        }

        .mission-section p {
            font-size: 1.1rem;
            color: #444;
        }

        .values-section {
            background-color: #e6e6e6;
            padding: 60px 20px;
            margin-bottom: 40px;
            border-radius: 10px;

        }

        .values-section h2 {
            font-size: 2.2rem;
            text-align: center;
            color: #222;
            margin-bottom: 30px;
        }

        .values-grid {
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }

        .value-item {
            background-color: #fff;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            width: 30%;
        }

        .value-item h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .value-item p {
            font-size: 1rem;
            color: #555;
        }

        .value-item:hover {
            transform: translateY(-10px);
        }

        .team-section {
            text-align: center;
            background-color: #fff;
            padding: 60px 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .team-section h2 {
            font-size: 2rem;
            color: #222;
            margin-bottom: 20px;
        }

        .team-section p {
            font-size: 1.1rem;
            color: #444;
        }

        .join-section {
            background-color: #ffcc00;
            padding: 80px 20px;
            text-align: center;
            border-radius: 10px;
        }

        .join-section h2 {
            font-size: 2.2rem;
            color: #222;
            margin-bottom: 20px;
        }

        .join-section p {
            font-size: 1.1rem;
            color: #444;
            margin-bottom: 30px;
        }

        .join-btn {
            background-color: #222;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .join-btn:hover {
            background-color: #444;
        }


        .section {
            margin-bottom: 40px;
            color: white;

        }

        .pagination .page-item.active .page-link {
        background-color: gold; /* Background color for active page */
        color: black; /* Text color for active page */
        border-color: gold; /* Border color to match background */
    }

    .pagination .page-link {
        background-color: gold; /* Default background color */
        color: black; /* Text color for other pages */
        border-color: gold; /* Border color for all pages */
        font-weight: bold;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #f8f9fa; /* Background color for disabled state */
        color: #6c757d; /* Grey text color for disabled state */
    }

    .pagination .page-item .page-link:hover {
        background-color: black; /* Background color on hover */
        color: gold; /* Text color on hover */
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
                        <a class="nav-link " href="MainPage.php">News & Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ranking.php">Ranking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Player.php">Player</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Tournament.php">Tournament</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="AboutUs.php">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="about-container">
        <br>
        <section class="hero-section">
            <h1>Welcome to MSTTC !</h1>
            <h5 class="hero-p">The number one table tennis club in Muadzam Shah</h5>
            <br>
            <p>
                Muadzam Shah Table Tennis Club (MSTTC) is a community dedicated to
                <strong>promoting the love of table tennis</strong> and <strong>developing players</strong> at all levels. We offer a platform for enthusiasts to
                <strong>train, compete,</strong> and <strong>improve</strong> in a friendly and supportive environment.
            </p>
            <p>
                Our club emphasizes <strong>sportsmanship, discipline,</strong> and <strong>excellence</strong> through regular tournaments and training.
                MSTTC’s rating system tracks player performance, providing a clear and fair evaluation of progress.
                Players earn points and climb the rankings by participating in club events, fostering a dynamic leaderboard
                that celebrates both experienced players and rising stars.
            </p>
            <p>
                At MSTTC, we value <strong>community, competition,</strong> and <strong>growth</strong>. Whether you’re just starting or already skilled,
                there’s a place for you here. Join us and be part of our exciting table tennis journey!
            </p>
        </section>


        <!-- Include Bootstrap Icons (if not already included) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <section class="mission-section">
    <div class="mission-content">
        <h2>Hey, Check Out These Videos!</h2>
        <ul class="youtube-icons" style="list-style-type: none; padding: 0; text-align: center;">

            <!-- Start of PHP loop to fetch and display videos -->
            <?php if ($result->num_rows > 0): ?>
                <?php 
                $count = 0; // To count the number of videos displayed
                while ($row = $result->fetch_assoc()): 
                    if ($count >= 5) break; // Only display up to 5 videos per page
                    $count++;
                ?>

                <!-- Dynamic video content from the database -->
                <li style="margin-bottom: 20px;">
                    <p><?php echo $row['video_title']; ?></p> <!-- Echo the video title dynamically -->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $row['youtube_link']; ?>" 
                            title="YouTube video player" frameborder="10" allow="accelerometer; autoplay; clipboard-write; 
                            encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </li>

                <?php endwhile; ?>
            <?php else: ?>
                <p style="color: white;">No videos available.</p>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <!-- Previous button -->
            <li class="page-item <?php if ($currentPage == 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
            </li>

            <!-- Page numbers (You can loop through this based on total pages) -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <!-- Next button -->
            <li class="page-item <?php if ($currentPage == $totalPages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
</section>




        <!-- Include Bootstrap JS (if not already included) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Include Bootstrap JS (if not already included) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <section class="values-section">
            <h2>Our Values</h2>
            <div class="values-grid">
                <div class="value-item">
                    <h3>Sportsmanship</h3>
                    <p>Integrity and respect are the foundation of our club. We believe in fair play and building strong relationships through the love of the game.</p>
                </div>
                <div class="value-item">
                    <h3>Inclusivity</h3>
                    <p>We open our doors to everyone, ensuring that all players, regardless of background or experience, feel welcome.</p>
                </div>
                <div class="value-item">
                    <h3>Development</h3>
                    <p>Growth is at the heart of our club. We’re committed to helping every player and coach improve, from beginners to seasoned professionals.</p>
                </div>
            </div>
        </section>

        <section class="values-section" style="text-align: center; margin: 40px 0;">
            <h2>Our Location</h2>
            <p>Visit us at our physical location:</p>
            <p>PING PONG ARENA MUADZAM SHAH</p>
            <div style="max-width: 600px; margin: 0 auto;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15951.104868725467!2d103.0612896!3d3.0678269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cf09add5ed2bc3%3A0xf8c2acc1d6bdc760!2sPING%20PONG%20ARENA%20MUADZAM%20SHAH!5e0!3m2!1sen!2smy!4v1695867544326!5m2!1sen!2smy"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>

            <a href="https://www.google.com/maps/place/PING+PONG+ARENA+MUADZAM+SHAH/@3.0676762,103.0612896,15.35z/data=!4m10!1m2!2m1!1smuadzam+shah+table+tennis+club!3m6!1s0x31cf09add5ed2bc3:0xf8c2acc1d6bdc760!8m2!3d3.0678269!4d103.070096!15sCh5tdWFkemFtIHNoYWggdGFibGUgdGVubmlzIGNsdWKSAQtzcG9ydHNfY2x1YuABAA!16s%2Fg%2F11s1w2s29b?authuser=0&entry=ttu&g_ep=EgoyMDI0MDkyMy4wIKXMDSoASAFQAw%3D%3D"
                target="_blank"
                class="btn btn-primary mt-3"
                style="padding: 10px 20px; font-size: 1.2rem; text-decoration: none; border-radius: 5px; margin-top: 30px;">
                View on Google Maps
            </a>

        </section>



        <section class="join-section">
            <div class="join-content">
                <h2>Join Us</h2>
                <p>Ready to start your table tennis journey? Whether you're a beginner or a seasoned player, there's a place for you at Muadzam Shah Table Tennis Club.</p>
                <a href="https://wa.me/60129612701" class="join-btn" target="_blank">Contact Us</a>
            </div>
        </section>
    </div>
    <br>


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