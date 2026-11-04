<?php
/**
 * classes/add.php — C (Create), шаг 1: ФОРМА добавления класса.
 * Открывается по адресу: index.php?page=addClass
 * После нажатия "Сохранить" данные уйдут в файл classes/insert.php.
 */
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Добавить класс</h1>
</div>

<div class="card">
  <div class="card-body">
    <!-- action — файл, который получит данные; method="post" — данные не видны в адресе -->
    <form action="classes/insert.php" method="post">
      <div class="mb-4">
        <!-- Подпись к полю -->
        <label class="form-label">Название класса</label>
        <!-- name="title" — под этим именем значение придёт в $_POST['title'];
             required — браузер не даст отправить пустое поле -->
        <input type="text" class="form-control" name="title" required>
      </div>

      <!-- Кнопка отправки формы -->
      <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
  </div>
</div>
