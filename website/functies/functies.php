
<?php


function controleerAdmin($mysqli) {
    if (!isset($_SESSION['email'])) {
        header('Location: index');
        exit();
    }   
    // Haal de type van de klant op
    $email = $_SESSION['email'];
    $stmt = $mysqli->prepare("SELECT type FROM tblklant WHERE email = ?");
    $stmt->bind_param("s", $email); // s staat voor string en stmt is de query
    $stmt->execute(); // Voer de query uit
    $result = $stmt->get_result();  // Haal het resultaat op
    $row = $result->fetch_assoc(); 
    $type = $row['type'];

    if ($type == "admin" || $type == "eigenaar") {
        // Admin or owner logic here
    } else {
        header('Location: index');
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
      header("Location: onderhoudsPagina");
   }
}


?>