<?php
/**
 * students/delete.php — D (Delete): УДАЛЕНИЕ ученика.
 * Открывается по ссылке "Удалить" из списка: students/delete.php?id=4
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём id из адреса; (int) — только число (защита от SQL-инъекций)
$id = (int) $_GET['id'];

// Собираем запрос. AND role = 'student' — удаляем только учеников, а не админа или учителя
$query = "DELETE FROM users WHERE id = $id AND role = 'student'";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку учеников
header("Location: ../index.php?page=students");
exit();
