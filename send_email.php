<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Email parameters
    $to = "stevediabo@gmail.com";
    $subject = "New Contact Form Submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Comment:\n$comment";

    // Send email
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        $response = array('msg' => 'Thank you for your submission!');
        echo json_encode($response);
    } else {
        $response = array('msg' => 'Error sending email.');
        echo json_encode($response);
    }
} else {
    $response = array('msg' => 'Error: Invalid request.');
    echo json_encode($response);
}
?>
