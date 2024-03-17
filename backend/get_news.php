<?php
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_username';
$password = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

$stmt = $pdo->query("SELECT * FROM news ORDER BY id DESC");
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
