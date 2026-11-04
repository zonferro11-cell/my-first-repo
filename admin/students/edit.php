<?php
/**
 * students/edit.php — U (Update), шаг 1: ФОРМА изменения ученика.
 * Открывается по адресу: index.php?page=editStudent&id=4
 */

// Берём id из адреса; (int) — только число (защита от SQL-инъекций)
$id = (int) $_GET['id'];

// SQL-запрос: найти ученика с таким id
$query = "SELECT * FROM users WHERE id = $id";
// Выполняем запрос
$result = mysqli_query($conn, $query);
// Достаём найденную строку в массив $student
$student = mysqli_fetch_assoc($result);

// Загружаем все классы для выпадающего списка
$query = "SELECT * FROM classes ORDER BY title";
$classes = mysqli_query($conn, $query);
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Изменить ученика</h1>
</div>

<div class="card">
  <div class="card-body">
    <!-- Форма отправляет данные в students/update.php -->
    <form action="students/update.php" method="post">
      <!-- Скрытое поле: id ученика -->
      <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

      <!-- ФИО (текущее значение из БД) -->
      <div class="mb-4">
        <label class="form-label">ФИО</label>
        <input type="text" class="form-control" name="full_name" value="<?php echo $student['full_name']; ?>" required>
      </div>

      <!-- Email (текущее значение из БД) -->
      <div class="mb-4">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $student['email']; ?>" required>
      </div>

      <!-- Выбор класса -->
      <div class="mb-4">
        <label class="form-label">Класс</label>
        <select class="form-select" name="class_id" required>
          <?php
          // Перебираем все классы
          while ($class = mysqli_fetch_assoc($classes)) {
            // Если это класс ученика — пишем selected, чтобы он был выбран в списке
            if ($class['id'] == $student['class_id']) {
              $selected = "selected";
            } else {
              $selected = "";
            }
          ?>
            <option value="<?php echo $class['id']; ?>" <?php echo $selected; ?>><?php echo $class['title']; ?></option>
          <?php
          } // конец цикла while
          ?>
        </select>
      </div>

      <!-- Кнопка отправки формы -->
      <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
  </div>
</div>
