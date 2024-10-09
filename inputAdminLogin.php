<?php
// Include the configuration file
include 'config.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


// Get form data
$user = $_POST['Username'];
$pass = $_POST['Password'];

// Prepare and bind
$stmt = $connect->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();  // Fetch the admin record

if ($result->num_rows > 0) {
    // Password is correct, generate OTP
    $otp_code = generateSecureNumericOTP(6); // Generate 6-digit OTP
    $otp_expiry = date("Y-m-d H:i:s", strtotime("+1 minutes")); // Set expiry time
    $admin_email = $admin['email']; // Assuming the email column is named email

    // Store OTP and expiry in the database
    $stmt = $connect->prepare("UPDATE admins SET otp_code = ?, otp_expiry = ? WHERE username = ?");
    $stmt->bind_param("sss", $otp_code, $otp_expiry, $user);
    $stmt->execute();

    // Send OTP via PHPMailer
    if (sendOTPEmail($admin_email, $otp_code)) {
        // Redirect to OTP verification page
        header("Location: verify_otp.php?user=" . urlencode($user));
        exit();
    } else {
        echo "Failed to send OTP email.Connection Eror";
    }
} else {
    // Login failed
    echo "Invalid Username or Password.";
}

// Close the connection
$stmt->close();
$connect->close();

// Function to generate a secure numeric OTP
function generateSecureNumericOTP($length = 6)
{
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= random_int(0, 9);  // Generate a secure random digit
    }
    return $otp;
}

// Function to send OTP email using PHPMailer
function sendOTPEmail($email, $otp_code)
{
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use Gmail's SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'alifjd2004@gmail.com'; // Your Gmail address
        $mail->Password = 'hovv fmmd baof ouwn'; // Your Gmail app-specific password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;


        // Email settings
        $mail->setFrom('alifjd2004@gmail.com', 'MSTTC Rating System'); // Your email and name
        $mail->addAddress($email); // Admin's email from the database

        $mail->isHTML(true);
        $mail->Subject = 'OTP Code Admin MSTTC';

        $mail->Body = '
         <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
        </head>
    
            <div style="background: linear-gradient(to right, black, gold); padding: 20px; font-family: Arial, sans-serif; text-align: center;">
                <div style="background-color: #1a1b34; padding: 50px 50px 50px 50px  ; border-radius: 10px; max-width: 600px; margin: 0 auto;">
                    <h1 style="font-weight: bold; color: whitesmoke;">MSTTC Rating System</h1>
                    <br>
                    <h2 style="color: #f2f2f2;">Login <span style="background-color: #fdd835; padding: 2px 8px; color: #000;">Code</span></h2>
                    
                    <div style="background-color:#f2f2f2; padding: 20px; border-radius: 8px; margin: 20px 0;">
                        <p style="font-size: 16px; color: #333;">Here is your login approval <span style="background-color: #fdd835; padding: 2px 4px;">code</span>:</p>
                        <h1 style="font-size: 48px; letter-spacing: 10px; color: #000;">' . $otp_code . '</h1>
                    </div>

                    <p style="color:whitesmoke;">If you didn\'t request this, <span style="background-color: darkred; padding: 2px 4px;">please ignore this email.</span></p>
                    <br>
                    <p style="color: whitesmoke;">&copy; 2024 MSTTC. All rights reserved.</p>

                </div>
            </div>
        ';


        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    }
}
