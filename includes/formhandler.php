<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['userName']);
    $email = htmlspecialchars($_POST['userMail']);
    $msg = htmlspecialchars($_POST['userMessage']);

    $to = "simonlamichhane.apps@gmail.com";
    $subject = "RAIN Auto-Message";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$msg";
    $headers = "From: contact@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        $message = "<p class='success'>✅ Your message was sent successfully!</p>";
    } else {
        $message = "<p class='error'>❌ Sorry, something went wrong. Please try again.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Form</title>
  <style>
    .success { color: green; }
    .error { color: red; }
    form { margin-top: 20px; }
  </style>
</head>
<body>

  <h2>Contact Us</h2>

  <!-- Message display -->
  <?php echo $message; ?>

  <!-- Contact form -->
  <form action="contact.php" method="POST">
    <label for="userName">Name:</label><br>
    <input type="text" id="userName" name="userName" required><br><br>

    <label for="userMail">Email:</label><br>
    <input type="email" id="userMail" name="userMail" required><br><br>

    <label for="userMessage">Message:</label><br>
    <textarea id="userMessage" name="userMessage" rows="4" required></textarea><br><br>

    <input type="submit" value="Send Message">
  </form>

</body>
</html>
