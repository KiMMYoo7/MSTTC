<?php
// Include the configuration file
include 'config.php';

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Ensure that the form has been submitted
if (isset($_POST['UsernameOtp'])) {
    $user = $_POST['UsernameOtp'];

    // Check if the username exists in the database
    $stmt = $connect->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $user);

    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();  // Fetch the admin record

    if ($result->num_rows > 0) {
        // Username exists, generate OTP
        $otp_code = generateSecureNumericOTP(6); // Generate a 6-digit OTP
        $otp_expiry = date("Y-m-d H:i:s", strtotime("+1 minutes")); // Set expiry time
        $admin_email = $admin['email']; // Get the admin's email

        // Store OTP and expiry in the database
        $stmt = $connect->prepare("UPDATE admins SET otp_code = ?, otp_expiry = ? WHERE username = ?");
        $stmt->bind_param("sss", $otp_code, $otp_expiry, $user);
        $stmt->execute();

        // Send OTP via email
        if (sendOTPEmail($admin_email, $otp_code)) {
            //echo "OTP has been resent to your email.";
            header("Location: verify_otp.php?" );
        } else {
            //echo "Failed to send OTP email.";
            header("Location: verify_otp.php?errorU=Failed to send OTP email.Connection Eror" );
        }
    } else {
       // echo "Invalid Username.";
       header("Location: verify_otp.php?errorU=Invalid Username." );
    }

    // Close the connection
    $stmt->close();
    $connect->close();
} else {
    //echo "Form not submitted properly.";
}

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
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alifjd2004@gmail.com'; // Your Gmail address
        $mail->Password = 'hovv fmmd baof ouwn'; // Your Gmail app-specific password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Email settings
        $mail->setFrom('alifjd2004@gmail.com', 'MSTTC Rating System');
        $mail->addAddress($email); // Admin's email

        $mail->isHTML(true);
        $mail->Subject = 'OTP Code Admin MSTTC';
        $mail->Body = '
        <div style="background: linear-gradient(to right, black, gold); padding: 20px; font-family: Arial, sans-serif; text-align: center;">
            <div style="background-color: #1a1b34; padding: 50px; border-radius: 10px; max-width: 600px; margin: 0 auto;">
                <h1 style="color: whitesmoke;">MSTTC Rating System</h1>
                <h2 style="color: #f2f2f2;">Your OTP Code</h2>
                <div style="background-color:#f2f2f2; padding: 20px; border-radius: 8px;">
                    <h1 style="font-size: 48px; letter-spacing: 10px; color: #000;">' . $otp_code . '</h1>
                </div>
                <p style="color:whitesmoke;">If you didn\'t request this, please ignore this email.</p>
                <p style="color: whitesmoke;">&copy; 2024 MSTTC. All rights reserved.</p>
            </div>
        </div>';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    }
}
?>
