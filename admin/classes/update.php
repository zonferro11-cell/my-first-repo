<?php
/**
 * classes/update.php — U (Update), шаг 2: СОХРАНЕНИЕ изменений класса.
 * Сюда отправляет данные форма из classes/edit.php.
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём данные из формы
$id = (int) $_POST['id'];   // id класса (из скрытого поля), (int) — только число
$title = $_POST['title'];   // новое название

// Экранируем кавычки в тексте (защита от SQL-инъекций)
$title = mysqli_real_escape_string($conn, $title);

// Собираем запрос: поменять название у класса с этим id
$query = "UPDATE classes SET title = '$title'  WHERE id = $id";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку классов
header("Location: ../index.php?page=classes");
exit();
