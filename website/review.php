
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="review.css">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libraries/aos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>
<body>

<style>
    .star-rating {
        direction: rtl;
        display: inline-block;
        padding: 20px;
    }
    .star-rating input[type="radio"] {
        display: none;
    }
    .star-rating label {
        font-size: 2em;
        color: #ddd;
        cursor: pointer;
    }
    .star-rating input[type="radio"]:checked ~ label {
        color: #ffba5a!important;
    }
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffba5a!important;
    }
</style>
<?php
// controleerAdmin($mysqli);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Zorg ervoor dat PHPMailer correct is geïnstalleerd

include 'connect.php';
session_start();
include 'functies/sideMenu.php';
include 'functies/functies.php';

onderhoudsModus();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['email'])) {
    header("Location: login");
    exit();
}

$query1 = "SELECT klant_id FROM tblklant WHERE email = ?";
$stmt1 = $mysqli->prepare($query1);
$stmt1->bind_param("s", $_SESSION['email']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$user1 = $result1->fetch_assoc();
$klant_id = $user1['klant_id'];
$klant_id = $user1 ? $user1['klant_id'] : null;

if (empty($klant_id)) {  
    header("Location: login");
    exit();
}

// Haal klantnaam op
$query = "SELECT klantnaam FROM tblklant WHERE klant_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $klant_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$klant_naam = $user ? $user['klantnaam'] : "Onbekend";

$message = "";

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = trim($_POST['review']);
    $rating = intval($_POST['rating']);

    if (!empty($review) && $rating >= 1 && $rating <= 5) {
        // Voeg de review toe aan de database en haal de ID op
        $sql = "INSERT INTO reviews (klant_id, rating, text, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iis", $klant_id, $rating, $review);

        if ($stmt->execute()) {
            $review_id = $stmt->insert_id; // Haal het ID van de nieuwe review op
            $message = '<div class="alert alert-success" role="alert">Review succesvol toegevoegd!</div>';
            echo '<meta http-equiv="refresh" content="2">';

            // **Stuur een e-mail met de review en de link**
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Vervang met je SMTP-server
                $mail->SMTPAuth = true;
                $mail->Username = 'needforcardetailing@gmail.com'; // Jouw SMTP-gebruikersnaam
                $mail->Password = 'oegtlrwnramtwhzt'; // Jouw SMTP-wachtwoord
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('needforcardetailing@gmail.com', 'NeedForCarDetailing');
                $mail->addAddress('needforcardetailing@gmail.com');

                $review_url = "https://needforcardetailing.be/reviewid=$review_id"; // Dynamische link

                $mail->isHTML(true);
                $mail->Subject = 'Nieuwe Review Geplaatst';
                $mail->Body = "<h2>Nieuwe Review van $klant_naam</h2>
                               <p><strong>Rating:</strong> $rating/5</p>
                               <p><strong>Review:</strong> $review</p>
                               <p><strong>Bekijk de review hier:</strong> <a href='$review_url'>$review_url</a></p>";

                $mail->send();
            } catch (Exception $e) {
                error_log("E-mail kon niet worden verzonden: {$mail->ErrorInfo}");
            }
        } else {
            $message = '<div class="alert alert-danger" role="alert">Er is iets misgegaan, probeer opnieuw.</div>';
        }

        $stmt->close();
    } else {
        $message = '<div class="alert alert-warning" role="alert">Vul een geldige review en rating in.</div>';
    }
}

// Haal alle reviews op
$sql = "SELECT r.rating, r.text, k.klantnaam AS naam, r.created_at 
        FROM reviews r 
        JOIN tblklant k ON r.klant_id = k.klant_id 
        ORDER BY r.created_at DESC";
$result = $mysqli->query($sql);
?>




    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Review</h5>
                    </div>
                    <div class="card-body">
                        <?php echo $message; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="review">Review</label>
                                <textarea name="review" id="review" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <div class="star-rating">
                                    <input type="radio" name="rating" id="rating5" value="5">
                                    <label for="rating5">★</label>
                                    <input type="radio" name="rating" id="rating4" value="4">
                                    <label for="rating4">★</label>
                                    <input type="radio" name="rating" id="rating3" value="3">
                                    <label for="rating3">★</label>
                                    <input type="radio" name="rating" id="rating2" value="2">
                                    <label for="rating2">★</label>
                                    <input type="radio" name="rating" id="rating1" value="1">
                                    <label for="rating1">★</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Plaats je review</button>
                        </form>
                    </div>
                </div>
                <br>
                <h3>Alle reviews</h3>
                <div class="filter mt-3">
    <label for="filter-rating">Filter op beoordeling:</label>
    <select id="filter-rating" class="form-control w-25" onchange="filterReviews()">
        <option value="all">Alle</option>
        <option value="5">⭐ 5 </option>
        <option value="4">⭐ 4 </option>
        <option value="3">⭐ 3 </option>
        <option value="2">⭐ 2 </option>
        <option value="1">⭐ 1 </option>
    </select>
    
    <label for="sort-reviews" class="mt-2">Filter: </label>
    <select id="sort-reviews" class="form-control w-25" onchange="sortReviews()">
        <option value="newest">Datum: Nieuwste eerst</option>
        <option value="oldest">Datum: Oudste eerst</option>
        <option value="high-low">Sterren: Hoog naar Laag</option>
        <option value="low-high">Sterren: Laag naar Hoog</option>
    </select>
</div>



<div class="list-group">
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="list-group-item" 
             data-rating="<?php echo $row['rating']; ?>" 
             data-date="<?php echo $row['created_at']; ?>">
            <h5><?php echo htmlspecialchars($row['naam']); ?></h5>
            <p><?php echo nl2br(htmlspecialchars($row['text'])); ?></p>
            <p>⭐ <?php echo $row['rating']; ?>/5</p>
            <small><?php echo $row['created_at']; ?></small>
        </div>
    <?php endwhile; ?>
</div>


            </div>
        </div>
    </div>




<script src="libraries/aos.js"></script>
<script>
    function filterReviews() {
        var selectedRating = document.getElementById("filter-rating").value;
        var reviews = document.querySelectorAll(".list-group-item");

        reviews.forEach(function(review) {
            var rating = review.getAttribute("data-rating");

            if (selectedRating === "all" || rating === selectedRating) {
                review.style.display = "block";
            } else {
                review.style.display = "none";
            }
        });
    }

    function sortReviews() {
        var sortType = document.getElementById("sort-reviews").value;
        var reviewList = document.querySelector(".list-group");
        var reviews = Array.from(reviewList.getElementsByClassName("list-group-item"));

        reviews.sort(function(a, b) {
            var ratingA = parseInt(a.getAttribute("data-rating"));
            var ratingB = parseInt(b.getAttribute("data-rating"));
            var dateA = new Date(a.getAttribute("data-date"));
            var dateB = new Date(b.getAttribute("data-date"));

            if (sortType === "newest") return dateB - dateA;
            if (sortType === "oldest") return dateA - dateB;
            if (sortType === "high-low") return ratingB - ratingA;
            if (sortType === "low-high") return ratingA - ratingB;
        });

        reviewList.innerHTML = "";
        reviews.forEach(review => reviewList.appendChild(review));
    }
</script>
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
