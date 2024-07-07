<?php
session_start();

// Update the details below with your MySQL details
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'user';

try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to the database!');
}

// Below function will convert datetime to time elapsed string.
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $w = floor($diff->d / 7);
    $diff->d -= $w * 7;
    $string = ['y' => 'year','m' => 'month','w' => 'week','d' => 'day','h' => 'hour','i' => 'minute','s' => 'second'];
    foreach ($string as $k => &$v) {
        if ($k == 'w' && $w) {
            $v = $w . ' week' . ($w > 1 ? 's' : '');
        } else if (isset($diff->$k) && $diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

if (isset($_GET['page_id'])) {
    if (isset($_POST['rating'], $_POST['content'])) {
        // Insert a new review (user submitted form)
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            $stmt = $pdo->prepare('INSERT INTO reviews (page_id, name, content, rating, submit_date) VALUES (?,?,?,?,NOW())');
            $stmt->execute([$_GET['page_id'], $username, $_POST['content'], $_POST['rating']]);
            exit('Your review has been submitted!');
        } else {
            exit('Please log in to write a review.');
        }
    }

    // Get all reviews by the username ordered by the submit date
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $stmt = $pdo->prepare('SELECT * FROM reviews WHERE name = ? ORDER BY submit_date DESC');
        $stmt->execute([$username]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Get the overall rating and total amount of reviews by the username
        $stmt = $pdo->prepare('SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM reviews WHERE name = ?');
        $stmt->execute([$username]);
        $reviews_info = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        exit('Please log in to view your reviews.');
    }
} else {
    exit('Please provide the page ID.');
}
?>

<div class="overall_rating">
    <h2 style='color:green'>Average of all the Ratings given by you in our website is</h2>
    <span class="num"><?=number_format($reviews_info['overall_rating'], 1)?></span>
    <span class="stars"><?=str_repeat('&#9733;', round($reviews_info['overall_rating']))?></span>
    <span class="total"><?=$reviews_info['total_reviews']?> reviews</span>
</div>

<?php foreach ($reviews as $review): ?>
<div class="review">
    <?php
    $stmt = $pdo->prepare('SELECT name FROM search_list WHERE page_id = ?');
    $stmt->execute([$review['page_id']]);
    $name = $stmt->fetchColumn();
    ?>
    <h3 class="name">
        <?php if ($name): ?>
            <?=htmlspecialchars($name, ENT_QUOTES)?>
        <?php else: ?>
            Unknown
        <?php endif; ?>
    </h3>
    <div>
        <span class="rating"><?=str_repeat('&#9733;', $review['rating'])?></span>
        <span class="date"><?=time_elapsed_string($review['submit_date'])?></span>
    </div>
    <p class="content"><?=htmlspecialchars($review['content'], ENT_QUOTES)?></p>
</div>
<?php endforeach ?>


