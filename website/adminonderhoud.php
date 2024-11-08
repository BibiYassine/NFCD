<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
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
        document.getElementById("sidenav").style.width = "250px"; // Open de sidenav
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0"; // Sluit de sidenav
    }

    AOS.init();
</script>
</body>
</html>
