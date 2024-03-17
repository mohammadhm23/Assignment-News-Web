<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "news_t"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$stmt = $conn->query("SELECT * FROM news ORDER BY id DESC");
$newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($newsList as $news) {
    echo '<div class="card mt-3">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $news['title'] . '</h5>';
    echo '<p class="card-text">' . $news['content'] . '</p>';
    echo '</div>';
    echo '</div>';
}
?>
