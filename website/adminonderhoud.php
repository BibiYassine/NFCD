<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel- NFCD</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    
</head>
<body>
    
<?php
include 'connect.php';
session_start();
include 'functies/sideMenu.php';
include 'functies/functies.php';
controleerAdmin($mysqli);
?>
    <div class="adminpageCenter">
    <h2 class="titel1">Onderhoudsmodus</h2><br>

    <?php
    // Check if maintenance mode is on or off
    $sql1 = "SELECT * FROM tbladmin WHERE functienaam = 'onderhoudmodus' AND functiewaarde = 1";
    $result1 = $mysqli->query($sql1);

    if ($result1 && $result1->num_rows > 0) {
        echo "Onderhoudsmodus<br>";
        echo "<form action='adminonderhoud' method='post'>
                <input type='submit' name='off' value='Zet onderhoudsmodus uit'><br>
              </form>"; 
    } else {
        echo "Onderhoudsmodus uit<br>";
        echo "<form action='adminonderhoud' method='post'>
                <input type='submit' name='on' value='Zet onderhoudsmodus aan'><br>
              </form>";
    }

    // Handle form submission to toggle maintenance mode
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['on'])) {
            $sql = "UPDATE tbladmin SET functiewaarde = 1 WHERE functienaam = 'onderhoudmodus'";
            if ($mysqli->query($sql)) {
                header("Refresh: 1; url=adminonderhoud");
                exit;
            } else {
                echo "Failed to enable maintenance mode.";
            }
        } elseif (isset($_POST['off'])) {
            $sql = "UPDATE tbladmin SET functiewaarde = 0 WHERE functienaam = 'onderhoudmodus'";
            if ($mysqli->query($sql)) {
                header("Refresh: 1; url=adminonderhoud");
                exit;
            } else {
                echo "Failed to disable maintenance mode.";
            }
        }
    }
    ?>

    </div>

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
