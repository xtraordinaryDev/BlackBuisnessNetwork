<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'subscribers.txt';
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        echo "Thank you for signing up! You will be notified when the apparel becomes available.";
    } else {
        echo "Invalid email address. Please go back and enter a valid email.";
    }
} else {
    echo "Invalid request method.";
}
?>