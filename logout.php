<?php
session_start();
session_unset(); // Удаление всех переменных сессии
session_destroy(); // Уничтожение сессии

header("Location: logacc.php"); // Перенаправление на страницу входа
exit();
?>
