<?php
session_start(); // Запуск сессии

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
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Проверка на пустые значения
    if (empty($username) || empty($password)) {
        die("Пожалуйста, заполните все поля.");
    }

    // Подготовка SQL-запроса для получения пользователя по логину
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    // Получение результата
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Получаем данные пользователя
        $user = $result->fetch_assoc();
        
        // Проверка пароля
        if (password_verify($password, $user['password'])) {
            // Успешный вход, сохраняем информацию о пользователе в сессии
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            echo "Вы успешно вошли в систему!";
            // Перенаправление на защищенную страницу или главную страницу
            header("Location: welcome.php");
            exit();
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь не найден.";
    }

    $stmt->close();
}

$conn->close();
?>
