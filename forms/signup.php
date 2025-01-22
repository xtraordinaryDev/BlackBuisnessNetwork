<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "connect@blackbusinessnetworkmn.org"; // Replace with your email address
        $subject = "BBN Toolkit Essentials";
        $body = $email . " signed up for BBN Toolkit Essentials!";
        $headers = "From: connect@blackbusinessnetworkmn.org"; // Replace with your domain's email address

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for contacting us! Your message has been sent.";
        } else {
            echo "There was an error sending your message. Please try again.";
        }
    } else {
        echo "Invalid email address. Please go back and enter a valid email.";
    }
} else {
    echo "Invalid request method.";
}
?>