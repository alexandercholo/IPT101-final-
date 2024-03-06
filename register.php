<?php
// To connect with the database connection file
session_start();
include "db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require 'PHPmailer/src/Exception.php';
require 'PHPmailer/src/PHPMailer.php';
require 'PHPmailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    // Check if email exists in the database
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .error-message {
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
                padding: 15px;
                border-radius: 5px;
                width: 300px;
                text-align: center;
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            }

            .error-message p {
                margin: 0;
            }

            .back-button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                margin-top: 15px;
            }

            .back-button:hover {
                background-color: #0056b3;
            }
        </style>
        <div class="container">
            <div class="error-message">
                <p>Email already exists</p>
                <button class="back-button" onclick="window.location.href=\'Registerform.php\'">Go Back</button>
            </div>
        </div>';
    } else {
        $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $email = $_POST['email'];
    $active = isset($_POST['active']) ? "Online" : "Offline";

    // Generate verification code
    $verification_code = bin2hex(random_bytes(32));

    // Value for the field
    $sql = "INSERT INTO user (user_id, username, password, lastname, firstname, middlename, email, active, verification_code)
            VALUES ('$user_id', '$username','$password','$lastname','$firstname','$middlename','$email','$active', '$verification_code')";

    if (mysqli_query($conn, $sql)) {
        // SMTP configuration
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'kimandriemancera@gmail.com';  // SMTP username
        $mail->Password = 'oaydmfuyxcujdbau';  // SMTP password
        $mail->SMTPSecure = 'tls';          // Enable TLS encryption
        $mail->Port = 587;                  // TCP port to connect to

        // Email content
        $mail->setFrom('kimandriemancera@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Please click the "verify" link to verify your email: <a href="http://localhost/ipt101/verified.php?email=' . $email . '&code=' . $verification_code . '">Verify</a>';

        // Send email
        try {
            $mail->send();

            header("Location: sent_notice.php?message=Verification email sent. Please check your email to verify your account.");
        } catch (Exception $e) {
            header("Location: Registerform.php?error=Failed to send verification email. Please try again later.");
        }
    } else {
        echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
    }
}
}
mysqli_close($conn);

?>