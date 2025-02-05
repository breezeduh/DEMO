<?php include("login.php") ?>
<?php include("register.php") ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в систему</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"></head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Вход в систему</h2>
        </div>
        <div class="card-body">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Логин:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="sumbit" class="btn btn-primary btn-block">Войти</button>
            </form>
            <!-- Ссылка на регистрацию -->
            <div class="text-center mt-3">
                <p>Нет аккаунта? <a href="registration.php">Зарегистрируйтесь</a></p> <!-- Убедитесь, что путь к странице регистрации правильный -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>

