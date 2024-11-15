<?php
session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen-NFCD</title>
    <link rel="stylesheet" href="form.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <div class="form">
        <h2>Inloggen</h2>
        <form action="login.php" method="POST">
            <label>E-mail</label>
            <input type="email" name="email" required class=><br><br> <!-- Changed to email input type -->
            <label>Wachtwoord</label>
            <input type="password" name="wachtwoord" required><br>
            <p>Nog geen account? <a href="register.php">Maak hier één</a></p>
            <p>Wachtwoord vergeten? <a href="reset_password">Reset hier</a></p>
            <input type="submit" value="Inloggen">
            
            <?php
            if (isset($_POST['email']) && isset($_POST['wachtwoord'])) {
                $email = $_POST['email'];
                $wachtwoord = $_POST['wachtwoord'];

                // Controleren of de gebruiker bestaat op basis van email
                $stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE email = ?");
                $stmt->bind_param("s", $email);// s staat voor string
                $stmt->execute(); // Voer de query uit
                $result = $stmt->get_result(); // Krijg het resultaat van de query
                $email = $result->fetch_assoc(); // Zet het resultaat om in een array

                if ($email && password_verify($wachtwoord, $email['wachtwoord'])) {
                    // Wachtwoord is correct, start de sessie
                    $_SESSION['email'] = $email['email']; // Opslaan van de klantnaam
                    $_SESSION['type'] = $email['type']; // Opslaan van het type gebruiker (bijv. klant of admin)
                    
                    // Controleer het type gebruiker
                    if ($user['type'] === 'admin') {
                        header('Location: admin');  // Redirect naar admin pagina
                    } else {
                        header('Location: index');  // Redirect naar klantpagina
                    }
                    exit();
                } else {
                    echo '<div class="error">E-mail of wachtwoord is onjuist</div>';
                }
            }
            ?>
            
        </form>
    </div>
</body>
</html>
