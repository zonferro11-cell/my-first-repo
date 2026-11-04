<?php
/**
 * classes/delete.php — D (Delete): УДАЛЕНИЕ класса.
 * Открывается по ссылке "Удалить" из списка: classes/delete.php?id=5
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём id из адреса; (int) — только число (защита от SQL-инъекций)
$id = (int) $_GET['id'];

// Собираем запрос: удалить класс с этим id
$query = "DELETE FROM classes WHERE id = $id";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку классов
header("Location: ../index.php?page=classes");
exit();
