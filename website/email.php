<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

$message = '';
$message_class = '';

if (isset($_GET['afspraak_id'])){
    $afspraak_id = $_GET['afspraak_id'];

    // Fetch appointment details from the database
    $stmt = $mysqli->prepare("SELECT a.klantnaam, a.email, b.email, c.servicenaam, b.datum, b.tijdslot, b.locatie, c.prijs FROM tblafspraken b, tblklant a, tblservice c WHERE b.afspraak_id = ? AND b.email = a.email AND b.service_id = c.service_id");
    if (!$stmt) {
        die('Prepare failed: ' . $mysqli->error);
    }
    $stmt->bind_param("i", $afspraak_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
        $klantnaam = $appointment['klantnaam'];
        $email = $appointment['email'];
        $service = $appointment['servicenaam'];
        $datum = $appointment['datum'];
        $tijd = $appointment['tijdslot'];
        $locatie = $appointment['locatie'];
        $prijs = $appointment['prijs'];
        $datum1 = new DateTime($datum);
        $formatted_date = $datum1->format('j M Y');

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';  
            $mail->SMTPAuth = true;
            $mail->Username = 'info@needforcardetailing.be';  
            $mail->Password = 'w365_LL1571';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  

            $mail->setFrom('info@needforcardetailing.be', 'NFCD');  
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Bevestiging van uw afspraak';
            $mail->Body    = '
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afspraak Bevestiging</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin-top: 20px;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: black;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            margin: 0 0 10px;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Bevestiging van uw Afspraak</h1>
        </div>
        <div class="email-body">
            <p>Beste ' . $klantnaam . ',</p>
            <p>Bedankt voor het maken van een afspraak bij Need for Car Detailing. Hier zijn de details van uw afspraak:</p>
            
            <div class="details">
                <p><span class="bold">Naam:</span> ' . $klantnaam . '</p>
                <p><span class="bold">E-mailadres:</span> ' . $email . '</p>
                <p><span class="bold">Service:</span> ' . $service . '</p>
                <p><span class="bold">Datum:</span> ' . $formatted_date . '</p>
                <p><span class="bold">Tijd:</span> ' . $tijd . '</p>
                <p><span class="bold">Locatie:</span> ' . $locatie . '</p>
                <p><span class="bold">Prijs:</span> 	&euro;' . $prijs . '</p>
            </div>

            <p>Als u vragen heeft of de afspraak wilt wijzigen, neem dan gerust contact met ons op via info@needforcardetailing.be of +32 123 456 789.</p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 Need for Car Detailing. Alle rechten voorbehouden.</p>
            <p>Adres Bedrijf | +32 499 91 21 81 | info@needforcardetailing.be</p>
        </div>
    </div>
</body>
</html>
';

            $mail->send();
            $message = 'De bevestigingsmail is verzonden.';
            $message_class = 'success';
            header("Location: success?id=true");
        } catch (Exception $e) {
            $message = "Er is iets misgegaan bij het verzenden van de e-mail. Mailer Error: {$mail->ErrorInfo}";
            $message_class = 'error';
        }
    } else {
        $message = "Geen afspraak gevonden met dit ID.";
        $message_class = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afspraak Bevestiging</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form">
        <?php if (!empty($message)): ?>
            <div class="message <?php echo $message_class; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>