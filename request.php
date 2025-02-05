<?php include("sumbit_request.php") ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Создание заявки</h2>
        </div>
        <div class="card-body">
            <form action="sumbit_request.php" method="POST">
                <div class="form-group">
                    <label for="address">Адрес:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона (формат +7(XXX)-XXX-XX-XX):</label>
                    <input type="text" class="form-control" id="phone"  name="phone" placeholder="+7(XXX)-XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="service_type">Вид услуги:</label>
                    <select class="form-control" id="service_type" name="service_type" required onchange="toggleCustomService(this)">
                        <option value="">Выберите услугу</option>
                        <option value="Услуга 1">Услуга 1</option>
                        <option value="Услуга 2">Услуга 2</option>
                        <option value="Иная услуга">Иная услуга</option>
                    </select>
                </div>
                <div class="form-group" id="custom_service_container" style="display:none;">
                    <label for="custom_service">Опишите желаемую услугу:</label>
                    <textarea class="form-control" id="custom_service" name="custom_service"></textarea>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Желаемая дата:</label>
                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                </div>
                <div class="form-group">
                    <label for="appointment_time">Время получения услуги:</label>
                    <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
                </div>
                <div class="form-group">
                    <label for="payment_method">Вид оплаты:</label><br />
                    <input type="radio" id="card" name="payment_method" value="card" required> 
                    <label for="card">Банковская карта</label><br />
                    <input type="radio" id="cash" name="payment_method" value="cash"> 
                    <label for "cash">Наличными</label><br />
                </div>
                <button type="submit" class="btn btn-primary btn-block">Отправить заявку</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Функция для отображения текстового поля при выборе "Иная услуга"
function toggleCustomService(selectElement) {
    const customServiceContainer = document.getElementById('custom_service_container');
    if (selectElement.value === 'Иная услуга') {
        customServiceContainer.style.display = 'block';
        document.getElementById('custom_service').required = true; // Устанавливаем поле как обязательное
    } else {
        customServiceContainer.style.display = 'none';
        document.getElementById('custom_service').required = false; // Убираем обязательность
        document.getElementById('custom_service').value = ''; // Очищаем поле
    }
}
</script>

</body>
</html>
