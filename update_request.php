<?php
session_start();

// Проверка, вошел ли пользователь как администратор
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Настройки подключения к базе данных
$servername = "localhost";
$username_db = "root";
$password_db = "1234";
$dbname = "requests";

// Создание подключения
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];
    $reason = isset($_POST['reason']) ? trim($_POST['reason']) : '';

    // Обновление статуса заявки в базе данных
    if ($status === 'отменено' && !empty($reason)) {
        $stmt = $conn->prepare("UPDATE requests SET status=?, cancellation_reason=? WHERE id=?");
        $stmt->bind_param("ssi", $status, $reason, $request_id);
    } else {
        $stmt = $conn->prepare("UPDATE requests SET status=? WHERE id=?");
        $stmt->bind_param("si", $status, $request_id);
    }

    if ($stmt->execute()) {
        header("Location: admin_panel.php"); // Перенаправление обратно на панель администратора
        exit();
    } else {
        echo "Ошибка обновления статуса: " . htmlspecialchars($stmt->error);
    }

    // Закрытие подготовленного выражения и соединения
    $stmt->close();
}

$conn->close();
?>
