<?php
/**
 * students/insert.php — C (Create), шаг 2: СОХРАНЕНИЕ нового ученика в БД.
 * Сюда отправляет данные форма из students/add.php.
 */

// Подключаем базу данных
require_once '../../conn.php';

// Берём данные из формы
$full_name = $_POST['full_name'];        // ФИО
$email = $_POST['email'];                // Email
$password = $_POST['password'];          // пароль
$class_id = (int) $_POST['class_id'];    // id класса, (int) — только число

// Пароль не храним в открытом виде: password_hash превращает его в "хэш".
// При входе пароль проверяется функцией password_verify() (auth/login_process.php).
//$password_hash = sha1($password, PASSWORD_DEFAULT);

// Экранируем кавычки в тексте (защита от SQL-инъекций)
$full_name = mysqli_real_escape_string($conn, $full_name);
$email = mysqli_real_escape_string($conn, $email);

// Собираем запрос. Текст — в кавычках '...', число $class_id — без кавычек.
// role всегда 'student', потому что эта форма добавляет только учеников.
$query = "INSERT INTO users (full_name, email, password_hash, role, class_id)
          VALUES ('$full_name', '$email', sha1('$password'), 'student', $class_id)";
echo  $query;
// Выполняем запрос; если ошибка (например, такой email уже есть) — показываем её
mysqli_query($conn, $query) or die("Ошибка: " . mysqli_error($conn));

// Возвращаемся к списку учеников
header("Location: ../index.php?page=students");
exit();
