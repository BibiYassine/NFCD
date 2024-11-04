<?php
include 'connect.php';
session_start();
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
            <label>E-mail of klantnaam</label>
            <input type="text" name="klantnaamofemail" required><br><br>
            <label>Wachtwoord</label>
            <input type="password" name="wachtwoord" required><br>
            <p>Nog geen account? <a href="register.php">Registreer</a></p>
            <br>
            <input type="submit" value="Inloggen">
            
            <?php
            if (isset($_POST['klantnaamofemail']) && isset($_POST['wachtwoord'])) {
                $klantnaam = $_POST['klantnaamofemail'];
                $wachtwoord = $_POST['wachtwoord'];

                // Controleren of de gebruiker bestaat
                $stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE klantnaam = ? OR email = ?");
                $stmt->bind_param("ss", $klantnaam, $klantnaam); // Binding the parameters as strings
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                $klantnaam = $user['klantnaam'];

                if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
                    // Wachtwoord is correct, start de sessie
                    $_SESSION['klantnaam'] = $klantnaam; // Opslaan van de klantnaam
                    $_SESSION['type'] = $user['type']; // Opslaan van het type gebruiker (bijv. klant of admin)
                    
                    // Controleer het type gebruiker
                    if ($user['type'] === 'admin') {
                        header('Location: admin.php');  // Redirect naar admin pagina
                    } else {
                        header('Location: index.php');  // Redirect naar klantpagina
                    }
                    exit();
                } else {
                    echo '<div class="error">Gebruikersnaam of wachtwoord is onjuist</div>';
                }
            }
            ?>
            
        </form>
    </div>
</body>
</html>
