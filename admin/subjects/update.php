<?php
/**
 * subjects/update.php — U (Update), шаг 2: СОХРАНЕНИЕ изменений предмета.
 * Сюда отправляет данные форма из subjects/edit.php.
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём данные из формы
$id = (int) $_POST['id'];   // id предмета, (int) — только число
$title = $_POST['title'];   // новое название

// Экранируем кавычки (защита от SQL-инъекций)
$title = mysqli_real_escape_string($conn, $title);

// Собираем запрос: поменять название у предмета с этим id
$query = "UPDATE subjects SET title = '$title' WHERE id = $id";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку предметов
header("Location: ../index.php?page=subjects");
exit();
