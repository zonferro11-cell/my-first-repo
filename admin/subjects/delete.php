<?php
/**
 * subjects/delete.php — D (Delete): УДАЛЕНИЕ предмета.
 * Открывается по ссылке "Удалить" из списка: subjects/delete.php?id=3
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём id из адреса; (int) — только число (защита от SQL-инъекций)
$id = (int) $_GET['id'];

// Собираем запрос: удалить предмет с этим id
$query = "DELETE FROM subjects WHERE id = $id";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку предметов
header("Location: ../index.php?page=subjects");
exit();
