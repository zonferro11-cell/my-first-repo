<?php
/**
 * classes/edit.php — U (Update), шаг 1: ФОРМА изменения класса.
 * Открывается по адресу: index.php?page=editClass&id=5
 * Форма уже заполнена текущими данными из БД.
 */

// Берём id из адреса; (int) превращает его в число (защита от SQL-инъекций)
$id = (int) $_GET['id'];

// SQL-запрос: найти класс с таким id
$query = "SELECT * FROM classes WHERE id = $id";
// Выполняем запрос
$result = mysqli_query($conn, $query);
// Достаём найденную строку в массив $class
$class = mysqli_fetch_assoc($result);
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Изменить класс</h1>
</div>

<div class="card">
  <div class="card-body">
    <!-- Форма отправляет данные в classes/update.php -->
    <form action="classes/update.php" method="post">
      <!-- Скрытое поле с id: так update.php узнает, какой класс менять -->
      <input type="hidden" name="id" value="<?php echo $class['id']; ?>">

      <div class="mb-4">
        <label class="form-label">Название класса</label>
        <!-- value — текущее название из БД -->
        <input type="text" class="form-control" name="title" value="<?php echo $class['title']; ?>" required>
      </div>

      <!-- Кнопка отправки формы -->
      <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
  </div>
</div>
