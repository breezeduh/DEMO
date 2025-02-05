<?php
session_start(); // Запуск сессии

if (!isset($_SESSION['user_id'])) {
    header("Location: logacc.php"); // Перенаправление на страницу входа, если пользователь не авторизован
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявка успешно оставлена</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Ваша заявка успешно оставлена!</h1>
<a href="logout.php">Выйти из аккаунта</a><br>
<a href="request.php">Оставить новую заявку</a>

</body>
</html>
