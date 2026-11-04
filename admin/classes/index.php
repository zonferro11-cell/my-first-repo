<?php
/**
 * classes/index.php — R (Read): СПИСОК классов.
 * Открывается по адресу: index.php?page=classes
 */

// SQL-запрос: все классы, отсортированные по названию
$query = "SELECT * FROM classes ORDER BY title";
// Выполняем запрос; $result — набор строк из базы
$result = mysqli_query($conn, $query);
?>
<!-- Заголовок страницы и кнопка "Добавить" -->
<div class="page-header">
  <h1 class="page-header-title">Классы</h1>
  <a class="btn btn-primary" href="?page=addClass">Добавить класс</a>
</div>

<!-- Карточка с таблицей -->
<div class="card">
  <table class="table table-align-middle card-table">
    <!-- Шапка таблицы -->
    <thead class="thead-light">
      <tr>
        <th>Название класса</th>
        <th>Расписания</th>
        <th>Журнал</th>
        <th>Изменить</th>
        <th>Удалить</th>
      </tr>
    </thead>

    <tbody>
      <?php
      // Цикл: пока в результате есть строки — достаём их по одной в $row
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <!-- Название класса -->
          <td><?php echo $row['title']; ?></td>

          <!-- Расписание -->
          <td><a class="btn btn-primary btn-sm" href="?page=timetable&id=<?php echo $row['id']; ?>">Открыть</a></td>
        
          <!-- Журнал -->
          <td><a class="btn btn-primary btn-sm" href="?page=journal&id=<?php echo $row['id']; ?>">Открыть</a></td>
        
          <!-- U — ссылка на форму изменения, в адресе передаём id класса -->
          <td><a class="btn btn-white btn-sm" href="?page=editClass&id=<?php echo $row['id']; ?>">Изменить</a></td>
          <!-- D — ссылка на удаление, в адресе передаём id класса -->
          <td><a class="btn btn-danger btn-sm" href="classes/delete.php?id=<?php echo $row['id']; ?>">Удалить</a></td>
        </tr>
      <?php
      } // конец цикла while
      ?>
    </tbody>
  </table>
</div>
