<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../private/db.inc.php';
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

$today = date('Y-m-d');
$stmt = $pdo->prepare("SELECT * FROM reminders 
                      WHERE reminder_date = ?
                      AND email IS NOT NULL");
$stmt->execute([$today]);
$reminders = $stmt->fetchAll();

foreach ($reminders as $reminder) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp-relay.brevo.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '';                             // Your SMTP login        
        $mail->Password   = '';                             // Your Brevo SMTP key
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('from@example.com', 'From Name');    // Sender -
        $mail->addAddress($reminder['email']);              //and recipient settings

        $mail->isHTML(false);
        $mail->Subject = 'Reminder' . htmlspecialchars($reminder['description']);
        $mail->Body    = "<h2>Reminder: " . htmlspecialchars($reminder['title']) . "</h2>
            <p><strong>Description:</strong> " . htmlspecialchars($reminder['description']) . "</p>
            <p><strong>Due Date:</strong> " . date('d.m.Y', strtotime($reminder['due_date'])) . "</p>
        ";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Error sending message: {$mail->ErrorInfo}";
    }
}