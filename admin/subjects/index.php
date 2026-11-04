<?php
/**
 * subjects/index.php — R (Read): СПИСОК предметов.
 * Открывается по адресу: index.php?page=subjects
 */

// SQL-запрос: все предметы, отсортированные по названию
$query = "SELECT * FROM subjects ORDER BY title";
// Выполняем запрос
$result = mysqli_query($conn, $query);
?>
<!-- Заголовок страницы и кнопка "Добавить" -->
<div class="page-header">
  <h1 class="page-header-title">Предметы</h1>
  <a class="btn btn-primary" href="?page=addSubject">Добавить предмет</a>
</div>

<!-- Карточка с таблицей -->
<div class="card">
  <table class="table table-align-middle card-table">
    <!-- Шапка таблицы -->
    <thead class="thead-light">
      <tr>
        <th>Название предмета</th>
        <th>Изменить</th>
        <th>Удалить</th>
      </tr>
    </thead>

    <tbody>
      <?php
      // Перебираем все строки результата по одной
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <!-- Название предмета -->
          <td><?php echo $row['title']; ?></td>
          <!-- U — ссылка на форму изменения -->
          <td><a class="btn btn-white btn-sm" href="?page=editSubject&id=<?php echo $row['id']; ?>">Изменить</a></td>
          <!-- D — ссылка на удаление -->
          <td><a class="btn btn-danger btn-sm" href="subjects/delete.php?id=<?php echo $row['id']; ?>">Удалить</a></td>
        </tr>
      <?php
      } // конец цикла while
      ?>
    </tbody>
  </table>
</div>
