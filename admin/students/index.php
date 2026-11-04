<?php
/**
 * students/index.php — R (Read): СПИСОК учеников.
 * Открывается по адресу: index.php?page=students
 *
 * Ученики хранятся в таблице users (там же учителя и админы),
 * поэтому берём только тех, у кого role = 'student'.
 */

// SQL-запрос: ученики + название их класса из таблицы classes.
// LEFT JOIN — ученик попадёт в список, даже если его класса нет в таблице classes.
$query = "SELECT users.id, users.full_name, users.email, classes.title AS class_title
          FROM users
          LEFT JOIN classes ON classes.id = users.class_id
          WHERE users.role = 'student'
          ORDER BY users.full_name";
// Выполняем запрос
$result = mysqli_query($conn, $query);
?>
<!-- Заголовок страницы и кнопка "Добавить" -->
<div class="page-header">
  <h1 class="page-header-title">Ученики</h1>
  <a class="btn btn-primary" href="?page=addStudent">Добавить ученика</a>
</div>

<!-- Карточка с таблицей -->
<div class="card">
  <table class="table table-align-middle card-table">
    <!-- Шапка таблицы -->
    <thead class="thead-light">
      <tr>
        <th>ФИО</th>
        <th>Email</th>
        <th>Класс</th>
        <th>Изменить</th>
        <th>Удалить</th>
      </tr>
    </thead>

    <tbody>
      <?php
      // Перебираем всех учеников по одному
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <!-- ФИО ученика -->
          <td><?php echo $row['full_name']; ?></td>
          <!-- Email ученика -->
          <td><?php echo $row['email']; ?></td>
          <!-- Название класса -->
          <td><?php echo $row['class_title']; ?></td>
          <!-- U — ссылка на форму изменения -->
          <td><a class="btn btn-white btn-sm" href="?page=editStudent&id=<?php echo $row['id']; ?>">Изменить</a></td>
          <!-- D — ссылка на удаление -->
          <td><a class="btn btn-danger btn-sm" href="students/delete.php?id=<?php echo $row['id']; ?>">Удалить</a></td>
        </tr>
      <?php
      } // конец цикла while
      ?>
    </tbody>
  </table>
</div>
