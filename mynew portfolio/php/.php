<?php
// Set the recipient email address
$to = "your-email-address@example.com";

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate the form data
if (empty($name) || empty($email) || empty($message)) {
  // If any fields are empty, return an error message
  die("Please fill out all fields.");
}

// Construct the email headers
$headers = "From: $name <$email>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Construct the email body
$body = "Name: $name<br>";
$body .= "Email: $email<br>";
$body .= "Message:<br>$message";

// Send the email
if (mail($to, "New message from your portfolio", $body, $headers)) {
  // If the email was sent successfully, redirect to a thank-you page
  header("Location: thank-you.html");
  exit;
} else {
  // If the email could not be sent, return an error message
  die("There was an error sending your message. Please try again later.");
}
?>
