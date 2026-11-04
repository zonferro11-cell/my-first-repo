<?php
/**
 * dashboard.php — главная страница админки.
 * Показывает, сколько в базе классов, предметов и учеников.
 */

// Считаем классы: COUNT(*) — количество строк в таблице
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM classes");
// Достаём строку результата и берём из неё число
$row = mysqli_fetch_assoc($result);
$classesCount = $row['total'];

// Считаем предметы
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM subjects");
$row = mysqli_fetch_assoc($result);
$subjectsCount = $row['total'];

// Считаем учеников (в таблице users только те, у кого role = 'student')
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role = 'student'");
$row = mysqli_fetch_assoc($result);
$studentsCount = $row['total'];
?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Главная</h1>
</div>

<!-- Ряд из трёх карточек -->
<div class="row">
  <!-- Карточка "Классы" -->
  <div class="col-sm-4 mb-3">
    <a class="card card-hover-shadow h-100" href="?page=classes">
      <div class="card-body">
        <h6 class="card-subtitle">Классы</h6>
        <h2 class="card-title text-inherit"><?php echo $classesCount; ?></h2>
      </div>
    </a>
  </div>

  <!-- Карточка "Предметы" -->
  <div class="col-sm-4 mb-3">
    <a class="card card-hover-shadow h-100" href="?page=subjects">
      <div class="card-body">
        <h6 class="card-subtitle">Предметы</h6>
        <h2 class="card-title text-inherit"><?php echo $subjectsCount; ?></h2>
      </div>
    </a>
  </div>

  <!-- Карточка "Ученики" -->
  <div class="col-sm-4 mb-3">
    <a class="card card-hover-shadow h-100" href="?page=students">
      <div class="card-body">
        <h6 class="card-subtitle">Ученики</h6>
        <h2 class="card-title text-inherit"><?php echo $studentsCount; ?></h2>
      </div>
    </a>
  </div>
</div>
