<?php
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    $stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50));  
        $expires = time() + 1800;  

        $update_stmt = $mysqli->prepare("UPDATE tblklant SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $update_stmt->bind_param("sis", $token, $expires, $email);
        $update_stmt->execute();

        $reset_link = "http://needforcardetailing.be/reset_password?token=" . $token;

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;
            $mail->Username = 'needforcardetailing@gmail.com';  
            $mail->Password = 'oegtlrwnramtwhzt';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  

            $mail->setFrom('needforcardetailing@gmail.com', 'NFCD');  
            $mail->addAddress($email);  
            $mail->Subject = 'Wachtwoord Reset Verzoek';
            $mail->Body    = 'Hallo, klik op de volgende link om je wachtwoord te resetten: ' . $reset_link;

            $mail->send();
            $message = 'Er is een mail verzonden naar je e-mail. Controleer je inbox of ongewenste mails!';
            $message_class = 'success';
        } catch (Exception $e) {
            $message = "Er is iets misgegaan bij het verzenden van de e-mail. Mailer Error: {$mail->ErrorInfo}";
            $message_class = 'error';
        }
    } else {
        $message = "De e-mail is niet gelinkt aan een account.";
        $message_class = 'error';
    }

    $stmt->close();
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['password'], $_POST['confirm_password'])) {
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                if ($password !== $confirm_password) {
                    $message = "Wachtwoorden komen niet overeen!";
                    $message_class = "error";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $mysqli->prepare("UPDATE tblklant SET wachtwoord= ?, reset_token = NULL WHERE reset_token = ?");
                    $stmt->bind_param("ss", $hashed_password, $token);

                    if ($stmt->execute()) {
                        $form_visible = false; 
                        $message = "Wachtwoord succesvol gereset! Je kunt nu inloggen.";
                        $message_class = "success";
                        sleep(1);
                        header("Location: login");
                    } else {
                        $message = "Er is een fout opgetreden tijdens het resetten van je wachtwoord.";
                        $message_class = "error";
                    }
                }
            } else {
                $message = "Vul alstublieft beide velden in.";
                $message_class = "error";
            }
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link rel="stylesheet" href="css/form3.css">
</head>
<body>

<?php if (!isset($_GET['token'])) { ?>
  <div class="wrapper">
    <form action="" method="POST">
      <h2>Wachtwoord vergeten?</h2>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Vul je e-mail adres in.</label>
      </div>
      <button type="submit">Verstuur</button>
      <br>
      <p>Controleer je inbox of ongewenste mails voor de resetlink.</p>
      <p>Als je niets hebt gekregen contacteer ons dan.</p>
    </form>
  </div>
<?php } else {
    if ($result->num_rows === 0) {
        echo "Ongeldige resetlink!";
    } else { ?>
    
        <div class="wrapper">
            <form method="POST" action="">
                <h2>Reset Wachtwoord</h2>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Nieuw wachtwoord</label>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" required>
                    <label>Bevestig wachtwoord</label>
                </div>
                <button type="submit">Wachtwoord resetten</button>
            </form>
        </div>
    <?php }
} ?>

</body>
</html>

