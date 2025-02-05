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

// Получение всех заявок
$sql = "SELECT * FROM requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Панель администратора</h1>
<a href="welcome.php">Выйти в главное меню</a><br>

<h2>Все заявки:</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>USER_ID</th>
        <th>Контактные данные</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['user_id']) ?></td> 
                <td><?= htmlspecialchars($row['phone']) ?></td> 
                <td><?= htmlspecialchars($row['status']) ?></td> 
                <td>
                    <!-- Кнопки для изменения статуса -->
                    <form action="update_request.php" method="POST">
                        <input type="hidden" name="request_id" value="<?= $row['id'] ?>">
                        <select name="status">
                            <option value="">Выберите статус</option>
                            <option value="в работе">В работе</option>
                            <option value="выполнено">Выполнено</option>
                            <option value="отменено">Отменено</option>
                        </select>
                        <!-- Поле для причины отмены -->
                        <input type="text" name="reason" placeholder="Причина отмены (если применимо)">
                        <button type="submit">Обновить статус</button> 
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">Нет заявок.</td></tr>
    <?php endif; ?>
</table>

<?php
$conn->close();
?>

</body>
</html>
