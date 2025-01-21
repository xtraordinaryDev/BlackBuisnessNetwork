<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email is valid, proceed with sending the email
        $to = "xtraordinarydev@outlook.com"; // Replace with your email address
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
        $headers = "From: connect@blackbusinessnetworkmn.org"; // Replace with your domain's email address

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for contacting us! Your message has been sent.";
        } else {
            echo "There was an error sending your message. Please try again.";
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