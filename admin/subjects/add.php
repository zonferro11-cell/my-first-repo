<?php
/**
 * subjects/add.php — C (Create), шаг 1: ФОРМА добавления предмета.
 * Открывается по адресу: index.php?page=addSubject
 * Данные отправляются в subjects/insert.php.
 */
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Добавить предмет</h1>
</div>

<div class="card">
  <div class="card-body">
    <!-- Форма отправляет данные методом POST в файл subjects/insert.php -->
    <form action="subjects/insert.php" method="post">
      <div class="mb-4">
        <!-- Подпись к полю -->
        <label class="form-label">Название предмета</label>
        <!-- Значение придёт в $_POST['title'] -->
        <input type="text" class="form-control" name="title" required>
      </div>

      <!-- Кнопка отправки формы -->
      <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
  </div>
</div>
