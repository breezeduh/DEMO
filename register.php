<?php
// Настройки подключения к базе данных
$servername = "localhost"; // или IP адрес вашего сервера
$username_db = "root"; // ваше имя пользователя базы данных
$password_db = "1234"; // ваш пароль базы данных
$dbname = "users"; // имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение и очистка данных из формы
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $fullname = trim($_POST['fullname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);

    // Проверка на пустые значения
    if (empty($username) || empty($password) || empty($fullname) || empty($phone) || empty($email)) {
        die("Пожалуйста, заполните все поля.");
    }

    // Проверка на существующий логин
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Логин уже занят, выберите другой.");
    }

    // Хеширование пароля
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Подготовка и выполнение SQL-запроса для вставки данных
    $stmt = $conn->prepare("INSERT INTO users (username, password, fullname, phone, email) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Ошибка подготовки запроса: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("sssss", $username, $passwordHash, $fullname, $phone, $email);

    if ($stmt->execute()) {
        echo "Регистрация прошла успешно!";
    } else {
        echo "Ошибка регистрации: " . htmlspecialchars($stmt->error);
    }

    // Закрытие подготовленного выражения и соединения
    $stmt->close();
}

$conn->close();
?>
