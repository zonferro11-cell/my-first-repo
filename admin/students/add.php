<?php
/**
 * students/add.php — C (Create), шаг 1: ФОРМА добавления ученика.
 * Открывается по адресу: index.php?page=addStudent
 * Данные отправляются в students/insert.php.
 */

// Загружаем все классы, чтобы показать их в выпадающем списке
$query = "SELECT * FROM classes ORDER BY title";
$classes = mysqli_query($conn, $query);
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Добавить ученика</h1>
</div>

<div class="card">
  <div class="card-body">
    <!-- Форма отправляет данные в students/insert.php -->
    <form action="students/insert.php" method="post">

      <!-- ФИО -->
      <div class="mb-4">
        <label class="form-label">ФИО</label>
        <input type="text" class="form-control" name="full_name" required>
      </div>

      <!-- Email; type="email" — браузер сам проверит, что это похоже на email -->
      <div class="mb-4">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>

      <!-- Пароль; type="password" — символы скрыты точками -->
      <div class="mb-4">
        <label class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <!-- Выбор класса -->
      <div class="mb-4">
        <label class="form-label">Класс</label>
        <select class="form-select" name="class_id" required>
          <?php
          // Для каждого класса из БД выводим пункт списка <option>
          while ($class = mysqli_fetch_assoc($classes)) {
          ?>
            <!-- value — id класса (уйдёт в БД), текст — название (видит пользователь) -->
            <option value="<?php echo $class['id']; ?>"><?php echo $class['title']; ?></option>
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
