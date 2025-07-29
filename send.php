<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "marco.paolo.gallo@gmail.com"; // 🔧 INSERISCI QUI la tua email
    $subject = "New message from your portfolio website";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    $subjectLine = strip_tags(trim($_POST["subject"]));

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subjectLine\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Something went wrong, please try again.";
    }
}
?>