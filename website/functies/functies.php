
<?php


function controleerAdmin($mysqli) {
    if (!isset($_SESSION['klantnaam'])) {
        header('Location: index.php');
        exit();
    }

    $klantnaam = $_SESSION['klantnaam'];
    $stmt = $mysqli->prepare("SELECT type FROM tblklant WHERE klantnaam = ?");
    $stmt->bind_param("s", $klantnaam);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $type = $row['type'];

    if ($type == "admin" || $type == "eigenaar") {
        // Admin or owner logic here
    } else {
        header('Location: index.php');
        exit();
    }
}

function onderhoudsModus()
{
   include 'connect.php';
   

   $sql = "SELECT functiewaarde FROM tbladmin where functienaam = 'onderhoudmodus'";
   $result = $mysqli->query($sql);
   $row = $result->fetch_assoc();

   if ($row["functiewaarde"] == 1) {
      header("Location: onderhoudsPagina.php");
   }
}


?>