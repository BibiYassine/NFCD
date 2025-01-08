<?php
session_start();
include 'connect.php';
include 'functies/sideMenu.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen - NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="form.css">    
    <link rel="stylesheet" href="libraries/aos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    
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
                $email = $_POST['email']; // Email van de gebruiker
                $wachtwoord = $_POST['wachtwoord']; // Wachtwoord van de gebruiker

                // Controleren of de gebruiker bestaat op basis van email
                $stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE email = ?"); //prepare dient om de query voor te bereiden en sql injectie te voorkomen
                $stmt->bind_param("s", $email);// s staat voor string en doet de waarde van $email in de query
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
    <script src="libraries/aos.js"></script>
    <script>
    
    function openNav() {
            document.getElementById("sidenav").style.width = "250px"; 
        }

        function closeNav() {
            document.getElementById("sidenav").style.width = "0"; 
        }

        AOS.init(); // Initialize animation library
    </script>
</body>
</html>
