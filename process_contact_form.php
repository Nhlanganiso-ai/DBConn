<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path as necessary

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "magu";

// Retrieve form data
$email = $_POST['email'];

$message = $_POST['message'];
$name = $_POST['name'];
$subject = $_POST['subject'];
// $date_submitted = $_POST['date_submitted'];
$phone = $_POST['phone'];
// Store message in database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO contact_messages (email, name, message, subject,phone) 
                            VALUES (:email, :name, :message, :subject,:phone)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':subject', $subject);
    // $stmt->bindParam(':date_submitted', $date_submitted);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();

    // Close connection
    $conn = null;

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'nhlanganiso.sikelela@outlook.com'; // SMTP username
    $mail->Password = 'nhlanganiso.masikane'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('nhlanganiso.sikelela@outlook.com', 'Nhlanganiso');
    $mail->addAddress('nhlanganiso.sikelela@outlook.com', 'Recipient Name');

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = "Email: $email<br>Phone: $phone<br>Message: $message";
// $mail->SMTPDebug = 2; // Enable debug output (0 = no output, 2 = verbose)

    $mail->send();
    echo 'Message sent successfully!';
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} catch(Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
