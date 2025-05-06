<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if fields are set and then process
    $name = isset($_POST['Name']) ? htmlspecialchars($_POST['Name']) : '';
    $email = isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : '';
    $phone = isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone']) : '';
    $message = isset($_POST['Message']) ? htmlspecialchars($_POST['Message']) : '';

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email sending logic (optional)
    $to = "your_email@example.com"; // replace with your email
    $subject = "New Contact Request";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Sorry, something went wrong.";
    }
} else {
    echo "Invalid request.";
}
?>