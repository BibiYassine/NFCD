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
    <link rel="stylesheet" href="form1.css">  
    <link rel="stylesheet" href="scroll.css">   
    <link rel="stylesheet" href="libraries/aos.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


    
</head>
<body>
<div class="wrapper">
    <form action="" method="POST">
      <h2>Welkom terug!<br> Log hier in.</h2>
        <div class="input-field">
        <input type="text" name="email" required autofill="off">
        <label>Vul je e-mail in</label>
      </div>
      <div class="input-field">
        <input type="password" name="wachtwoord" required>
        <label>Vul je wachtwoord in</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="reset_password">Wachtwoord vergeten?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Nog geen account? <a href="register">Registreer hier</a></p>
      </div>
      <?php
      if (isset($login_error)) {
          echo '<div class="error">' . $login_error . '</div>';
      }
      ?>
    </form>
  </div>
            <?php
            if (isset($_POST['email']) && isset($_POST['wachtwoord'])) {
                $email = $_POST['email']; // Email van de gebruiker
                $wachtwoord = $_POST['wachtwoord']; // Wachtwoord van de gebruiker

                // Controleren of de gebruiker bestaat op basis van email
                $stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE email = ?"); //prepare dient om de query voor te bereiden en sql injectie te voorkomen
                $stmt->bind_param("s", $email);// s staat voor string en doet de waarde van $email in de query
                $stmt->execute(); // Voer de query uit
                $result = $stmt->get_result(); // Krijg het resultaat van de query
                $user = $result->fetch_assoc(); // Zet het resultaat om in een array

                if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
                    // Wachtwoord is correct, start de sessie
                    $_SESSION['email'] = $user['email']; // Opslaan van de klantnaam
                    $_SESSION['type'] = $user['type']; // Opslaan van het type gebruiker (bijv. klant of admin)
                    
                    // Controleer het type gebruiker
                    if ($user['type'] === 'admin') {
                        header('Location: admin');  // Redirect naar admin pagina
                    } else {
                        header('Location: index');  // Redirect naar klantpagina
                    }
                    exit();
                } else {
                    $login_error = 'E-mail of wachtwoord is onjuist. Probeer opnieuw.';
                }
            }
            ?>
            
    
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
