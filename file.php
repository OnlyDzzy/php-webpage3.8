<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = htmlspecialchars($_POST["userName"]);
    $raiting = htmlspecialchars($_POST["raiting"]);
    $otzyv = htmlspecialchars($_POST["otzyv"]);

    $dsn = 'mysql:host=localhost;dbname=new_db';
    $username = 'root';
    $password = 'qwe123';
    try {
    $pdo = new PDO($dsn, $username, $password);
    // Устанавливаем режим обработки ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
    }

    $sql = "INSERT INTO reviews (name, review, rating) VALUES (:userName, :otzyv,
:raiting)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $userName, 'review' => $$otzyv, 'rating' => $otzyv]);
echo "Отзыв успешно добавлен!";
}

$sql = "SELECT * FROM reviews";
$stmt = $pdo->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($reviews as $review) {
    echo "<p><strong>{$review['name']}</strong>: {$review['review']} (Рейтинг:
    {$review['rating']})</p>";
    }