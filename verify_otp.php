<?php
    // Include the configuration file for database connection
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get form data
        $user = $_POST['Username']; // Username entered by admin
        $entered_otp = $_POST['otp']; // OTP entered by admin

        // Prepare and bind the SQL statement
        $stmt = $connect->prepare("SELECT * FROM admins WHERE username = ? AND otp_code = ?");
        $stmt->bind_param("ss", $user, $entered_otp);

        // Execute the statement and fetch the admin record
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin) {
            // Check if the OTP has expired
            $current_time = new DateTime();
            $otp_expiry = new DateTime($admin['otp_expiry']);

            if ($current_time < $otp_expiry) {
                // OTP is valid, redirect to the admin dashboard
                header("Location: Admin.html"); // Redirect to the admin dashboard
                exit();
            } else {
                // OTP is expired, redirect back to the form with an error message
                header("Location: verify_otp.php?error=Invalid or expired OTP.");
                exit();
            }
        } else {
            // Username and OTP combination not found, redirect back with an error message
            header("Location: verify_otp.php?error=No user found or incorrect OTP.");
            exit();
        }

        // Close the statement and connection
        $stmt->close();
        $connect->close();
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify OTP - MSTTC</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                background: linear-gradient(to right, black, gold);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
            }

            .card {
                background-color: #1a1b34;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                max-width: 500px;
                width: 150%;
            }

            img {
                position: absolute;
                top: 20px;
                left: 10px;
                width: 200px;
                height: 70px;
                margin-bottom: 0px;
            }

            .otp-container {
                background-color: #1a1b34;
                padding: 40px;
                max-width: 400px;
                width: 100%;
                margin-top: 50px;
            }

            .otp-container h3 {
                text-align: center;
                color: whitesmoke;
                margin-bottom: 30px;
                font-weight: bold;
            }

            .otp-container input[type="text"] {
                margin-bottom: 20px;
                border-radius: 8px;
                border: 1px solid #ccc;
                height: 45px;
                padding: 10px;
            }

            .otp-container button {
                background-color: #00bf63;
                color: white;
                border: none;
                border-radius: 8px;
                padding: 12px;
                width: 100%;
                font-size: 16px;
                font-weight: bold;
                transition: background-color 0.3s ease;
            }

            .otp-container button:hover {
                background-color: darkgreen;
            }

            label {
                font-size: 12px;
                font-weight: bold;
                color: whitesmoke;
            }

            @keyframes popout {
                0% {
                    transform: scale(0);
                    opacity: 0;
                }

                50% {
                    transform: scale(1.05);
                    opacity: 1;
                }

                100% {
                    transform: scale(1);
                }


            }

            .popout-animation {
                animation: popout 0.5s ease-in-out;
            }

            .resendotp {
                width: 150px;
                border-radius: 0;

            }

            .resend-button {
        border: none;
        background-color: transparent;
        color: gold;
        font-size: 16px;
        cursor: pointer;
        transition: color 0.3s ease; /* Smooth transition effect */
    }

    .resend-button:hover {
        color: darkgoldenrod; /* Darker gold on hover */
    }


        </style>
    </head>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <body>
        <div class="card">
            <img src="MsttcLogo-1.png" alt="MSTTC Logo">

            <div class="otp-container">
                <h3>Verify Your OTP</h3>
                <form action="verify_otp.php" method="post">
                    <label for="">*For Security Purpose Enter back the Admin Username</label>
                    <input type="text" name="Username" class="form-control" placeholder="Enter Username" required>
                    <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
                    <button type="submit" class="btn btn-warning">Verify</button>
                </form>
                <br>
                <form action="ResendOtp.php" method="post">
                <input type="submit" value="RESEND OTP" class="resend-button"><br>
                    <label for="">*Username Needed to Resend OTP</label>
                    <input type="text" name="UsernameOtp" class="resendotp" placeholder="Enter Username" required>

                </form>



                <!-- Display the Bootstrap alert if there is an error -->
                <?php if (isset($_GET['error'])) : ?>
                    <div class="alert alert-danger d-flex align-items-center popout-animation" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="25" height="20" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            <?php echo $_GET['error']; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Display the Bootstrap alert if there is an error -->
                <?php if (isset($_GET['errorU'])) : ?>
                    <div class="alert alert-danger d-flex align-items-center popout-animation" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="25" height="20" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            <?php echo $_GET['errorU']; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </body>

    </html>