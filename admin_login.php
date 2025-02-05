<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка логина и пароля
    if ($username === 'adminka' && $password === 'password') {
        $_SESSION['is_admin'] = true; // Устанавливаем флаг администратора
        header("Location: admin_panel.php"); // Перенаправление в панель администратора
        exit();
    } else {
        echo "Неверный логин или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в панель администратора</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Вход в панель администратора</h1>
<form action="admin_login.php" method="POST">
    <label for="username">Логин:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Войти</button>
</form>

</body>
</html>
