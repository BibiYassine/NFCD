<?php
// Laad PHPMailer
require 'vendor/autoload.php'; // Als je Composer gebruikt, anders de path naar PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['email'])) { // Controleer of het formulier is ingediend
    // Haal het e-mailadres uit het formulier
    $email = $_POST['email'];

    // Maak een nieuwe PHPMailer-instantie
    $mail = new PHPMailer(true);

    try {
        // Serverinstellingen
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Gebruik Gmail SMTP-server
        $mail->SMTPAuth = true;
        $mail->Username = 'needforcardetailing@gmail.com';  // Je Gmail e-mailadres
        $mail->Password = 'oegtlrwnramtwhzt';  // Het wachtwoord voor je Gmail (of een app-specifiek wachtwoord als je 2FA hebt)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Ontvangers
        $mail->setFrom('needforcardetailing@gmail.com', 'NeedForCarDetailing');
        $mail->addAddress($email);  // Het e-mailadres van de inschrijver

        // Inhoud van de e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Welkom bij de Nieuwsbrief van NeedForCarDetailing';
        $mail->Body    = '
        <!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwsbrief - NeedForCarDetailing</title>
    <style>
        /* Algemene stijlen voor de e-mail */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
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
            background-color: #263238;
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
        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #263238;
            margin-top: 20px;
        }
        .details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            margin: 0 0 10px;
        }
        .highlight {
            color: #263238;
            font-weight: bold;
        }
        .offer {
            background-color: #f5f5f5;
            padding: 15px;
            border-left: 5px solid #263238;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Nieuwsbrief van NeedForCarDetailing</h1>
        </div>
        <div class="email-body">
            <p>Beste lezer,</p>
            <p>Bedankt dat u zich heeft ingeschreven voor de nieuwsbrief van NeedForCarDetailing! We houden u graag op de hoogte van:</p>
            <ul>
                <li>Nieuwe kortingen en aanbiedingen</li>
                <li>Bedrijfsnieuws en updates</li>
                <li>Speciale aanbiedingen voor onze trouwe klanten</li>
            </ul>
            
            <div class="offer">
                <p><span class="highlight">Speciale Aanbieding!</span></p>
                <p>Profiteer van een <span class="highlight">20% korting</span> op uw volgende service. Gebruik de code <span class="highlight">KORTING20</span> bij het boeken van uw afspraak op onze website.</p>
                <p><strong>Let op:</strong> Deze aanbieding is geldig tot [Datum].</p>
            </div>

            <div class="section-title">Wat kunt u in de toekomst verwachten?</div>
            <div class="details">
                <p> <strong>Nieuwe Diensten:</strong> We breiden ons aanbod uit en voegen binnenkort meer services toe.</p>
                <p> <strong>Exclusieve Klantenspecials:</strong> Voor onze nieuwsbrieflezers zijn er binnenkort exclusieve kortingen!</p>
                <p> <strong>Tips en Advies:</strong> We delen regelmatig tips over het onderhoud van uw voertuig en hoe u uw auto in topconditie kunt houden.</p>
            </div>

            <p>We kijken ernaar uit om u op de hoogte te houden van alles wat we te bieden hebben! Blijf op de hoogte voor meer spannende updates.</p>

            <p>Met vriendelijke groet,</p>
            <p><strong>Het Team van NeedForCarDetailing</strong></p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 NeedForCarDetailing. Alle rechten voorbehouden.</p>
            <p> <a href="mailto:needforcardetailing@gmail.com">needforcardetailing@gmail.com</a></p>
        </div>
    </div>
</body>
</html>';
        // Verstuur de e-mail
        $mail->send();

        // Success bericht en redirect
        echo '<script type="text/javascript">
                alert("Succesvol ingeschreven! U ontvangt binnenkort onze nieuwsbrief.");
                window.history.back(); // Terug naar de vorige pagina
              </script>';
    } catch (Exception $e) {
        echo "Er is iets mis gegaan. Probeer het opnieuw later.";
    }
} else {
    echo 'Geen e-mailadres ontvangen.';
}
?>
