<?php
/**
 * subjects/edit.php — U (Update), шаг 1: ФОРМА изменения предмета.
 * Открывается по адресу: index.php?page=editSubject&id=3
 */

// Берём id из адреса; (int) — только число (защита от SQL-инъекций)
$id = (int) $_GET['id'];

// SQL-запрос: найти предмет с таким id
$query = "SELECT * FROM subjects WHERE id = $id";
// Выполняем запрос
$result = mysqli_query($conn, $query);
// Достаём найденную строку в массив $subject
$subject = mysqli_fetch_assoc($result);
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Изменить предмет</h1>
</div>

<div class="card">
  <div class="card-body">
    <!-- Форма отправляет данные в subjects/update.php -->
    <form action="subjects/update.php" method="post">
      <!-- Скрытое поле: id предмета -->
      <input type="hidden" name="id" value="<?php echo $subject['id']; ?>">

      <div class="mb-4">
        <label class="form-label">Название предмета</label>
        <!-- value — текущее название из БД -->
        <input type="text" class="form-control" name="title" value="<?php echo $subject['title']; ?>" required>
      </div>

      <!-- Кнопка отправки формы -->
      <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
  </div>
</div>
