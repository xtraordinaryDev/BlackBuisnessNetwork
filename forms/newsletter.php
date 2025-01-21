<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email is valid, proceed with sending the email
        $to = "connect@blackbusinessnetworkmn.org";
        $subject = "Newsletter Subscription Confirmation";
        $message = $email . " subscribed to your newsletter!";
        $headers = "From: connect@blackbusinessnetworkmn.org\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for subscribing!";
        } else {
            echo "There was an error sending the confirmation email. Please try again.";
        }
    } else {
        // Email is not valid
        echo "Invalid email address.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>