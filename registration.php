<?php include("register.php") ?> 
<?php include("login.php") ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация и Вход</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Регистрация пользователя</h2>
        </div>
        <div class="card-body">
            <!-- Форма регистрации -->
            <form id="regForm" action="register.php" method="POST">
                <div class="form-group">
                    <label for="username">Уникальный логин:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль (минимум 6 символов):</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                </div>
                <div class="form-group">
                    <label for="fullname">ФИО:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон (формат +7(XXX)-XXX-XX-XX):</label>
                    <input type="text" class="form-control" id="phone"  name="phone" placeholder="+7(XXX)-XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="email">Адрес электронной почты:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
            </form>

            <!-- Раздел для входа -->
            <hr>
            <h4 class="text-center">Или войдите в систему</h4>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="login_username">Логин:</label>
                    <input type="text" class="form-control" id="login_username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="login_password">Пароль:</label>
                    <input type="password" class="form-control" id="login_password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Войти</button>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
$(document).ready(function(){
    $("#phone").inputmask("+7(999)-999-99-99"); // Установка маски
});
</script>

</body>
</html>
