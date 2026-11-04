<?php
/**
 * subjects/insert.php — C (Create), шаг 2: СОХРАНЕНИЕ нового предмета в БД.
 * Сюда отправляет данные форма из subjects/add.php.
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём название предмета из формы
$title = $_POST['title'];

// Экранируем кавычки (защита от SQL-инъекций)
$title = mysqli_real_escape_string($conn, $title);

// Собираем SQL-запрос
$query = "INSERT INTO subjects (title) VALUES ('$title')";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку предметов
header("Location: ../index.php?page=subjects");
exit();
