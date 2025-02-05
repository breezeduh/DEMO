<?php
session_start(); // Запуск сессии

if (!isset($_SESSION['user_id'])) {
    header("Location: logacc.php"); // Перенаправление на страницу входа, если пользователь не авторизован
    exit();
}

// Настройки подключения к базе данных
$servername = "localhost"; // или IP адрес вашего сервера
$username_db = "root"; // ваше имя пользователя базы данных
$password_db = "1234"; // ваш пароль базы данных
$dbname = "requests"; // имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $service_type = trim($_POST['service_type']);
    $custom_service = isset($_POST['custom_service']) ? trim($_POST['custom_service']) : '';
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $payment_method = $_POST['payment_method'];

    // Проверка на пустые значения
    if (empty($address) || empty($phone) || empty($service_type) || empty($appointment_date) || empty($appointment_time) || empty($payment_method)) {
        die("Пожалуйста, заполните все поля.");
    }

    // Подготовка и выполнение SQL-запроса для вставки данных
    $stmt = $conn->prepare("INSERT INTO requests (user_id, address, phone, service_type, custom_service, appointment_date, appointment_time, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Ошибка подготовки запроса: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("issssiss", $user_id, $address, $phone, $service_type, $custom_service, $appointment_date, $appointment_time, $payment_method);

    if ($stmt->execute()) {
        header("Location: request_success.php");
        exit();
    } else {
        echo "Ошибка отправки заявки: " . htmlspecialchars($stmt->error);
    }

    // Закрытие подготовленного выражения и соединения
    $stmt->close();
}

$conn->close();
?>
