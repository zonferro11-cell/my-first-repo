<?php
/**
 * students/update.php — U (Update), шаг 2: СОХРАНЕНИЕ изменений ученика.
 * Сюда отправляет данные форма из students/edit.php.
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём данные из формы
$id = (int) $_POST['id'];                // id ученика, (int) — только число
$full_name = $_POST['full_name'];        // ФИО
$email = $_POST['email'];                // Email
$class_id = (int) $_POST['class_id'];    // id класса

// Экранируем кавычки в тексте (защита от SQL-инъекций)
$full_name = mysqli_real_escape_string($conn, $full_name);
$email = mysqli_real_escape_string($conn, $email);

// Собираем запрос: обновить ФИО, email и класс у ученика с этим id
$query = "UPDATE users
          SET full_name = '$full_name', email = '$email', class_id = $class_id
          WHERE id = $id";

// Выполняем запрос; если ошибка — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку учеников
header("Location: ../index.php?page=students");
exit();
