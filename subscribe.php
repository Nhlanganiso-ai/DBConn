<?php
// subscribe.php

if (isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize email
    
    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Send email to admin
        $to = "nhlanganiso.sikelela@outlook.com"; // Replace with your email
        $subject = "New Subscription Request";
        $message = "A new subscription has been made with the email: " . $email;
        $headers = "From: no-reply@example.com\r\n";
        $headers .= "Reply-To: no-reply@example.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo 'success'; // Return success message
        } else {
            echo 'error'; // If email couldn't be sent
        }

        // Optional: Send a confirmation email to the user
        $subject_user = "Subscription Confirmation";
        $message_user = "Thank you for subscribing with the email: " . $email;
        $headers_user = "From: no-reply@example.com\r\n";
        
        mail($email, $subject_user, $message_user, $headers_user);

    } else {
        echo 'Invalid email format'; // Return specific error message
    }
} else {
    echo 'error'; // No email submitted
}
?>

