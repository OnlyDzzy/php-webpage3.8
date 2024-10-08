<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Получаем данные из формы
$order_id = htmlspecialchars(trim($_POST['order_id']));
$reason = isset($_POST['reason']) ? htmlspecialchars(trim($_POST['reason'])) : '';
// Проверка наличия номера заказа
if (empty($order_id)) {
echo "Номер заказа обязателен.";
};

$sql = "INSERT INTO cancellations (order_id, reason) VALUES (:order_id, :reason)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['order_id' => $order_id, 'reason' => $reason]);
echo "Заказ #$order_id успешно отменен!";
}