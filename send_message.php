<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['Subject']);
    $message = htmlspecialchars($_POST['Message']);

    // Set the email address where the form will be sent
    $to = "Sharooshan123@gmail.com"; // Your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    // Email subject and body
    $email_subject = "New Message from $name";
    $email_body = "<h3>You have received a new message from your website contact form:</h3>
                   <p><b>Name:</b> $name</p>
                   <p><b>Email:</b> $email</p>
                   <p><b>Subject:</b> $subject</p>
                   <p><b>Message:</b><br>$message</p>";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        error_log("Failed to send email to $to.");
        echo "Failed to send the message.";
    }
}
?>
