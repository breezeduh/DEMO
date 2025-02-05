<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logacc.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body  class="d-flex justify-content-center align-items-center">

<h1>Добро пожаловать, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
<a href="logout.php" class="btn btn-warning">Выйти</a><br>
<a href="request.php" class="btn btn-warning">Создать заявку</a><br>

<!-- Кнопка для перехода в панель администратора -->
<a href="admin_login.php" class="btn btn-warning">Панель администратора</a>

</body>
</html>
