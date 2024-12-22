<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['Subject']);
    $message = htmlspecialchars($_POST['Message']);

    // Recipient email
    $to = "sharooshan123@gmail.com";

    // Subject of the email
    $email_subject = "New Message from: $name";

    // Email body content
    $email_body = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <h2>You have received a new message from the contact form:</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    // Headers for the email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href = 'thank_you_page.php';</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.'); window.location.href = 'contact_page.php';</script>";
    }
}
?>
