<?php


/**
 * admin/index.php — главный файл админ-панели.
 *
 * Все страницы админки открываются через него: index.php?page=ИМЯ
 * Сам файл собирает страницу из частей (папка partials):
 *
 *   head.php           — <head>, CSS
 *   navbar.php         — боковое меню
 *   content.php        — содержимое страницы (список, форма)
 *   footer.php         — подвал
 *   footer_scripts.php — JavaScript
 *
 * Почему так: шаблон один, а страниц много. Если нужно поменять меню —
 * правим только navbar.php, и меню поменяется на всех страницах.
 */
session_start();



// Подключаем базу данных: после этого доступна переменная $conn
require_once '../conn.php';

// Выводим начало HTML-документа (<!DOCTYPE>, <head>, CSS)
require_once 'partials/head.php';
?>
<!-- Классы body нужны шаблону: вертикальное меню слева и отступ под подвал -->
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

  <!-- Скрипт темы (светлая/тёмная) подключается сразу после <body> -->
  <script src="../assets/admin/js/hs.theme-appearance.js"></script>

  <!-- Запоминает, было ли меню свёрнуто -->
  <script src="../assets/admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

  <!-- Боковое меню -->
  <?php require_once 'partials/navbar.php'; ?>

  <!-- Основная часть страницы -->
  <main id="content" role="main" class="main">
    <!-- Контейнер с отступами -->
    <div class="content container-fluid">
      <!-- Содержимое выбранной страницы -->
      <?php require_once 'partials/content.php'; ?>
    </div>

    <!-- Подвал -->
    <?php require_once 'partials/footer.php'; ?>
  </main>

  <!-- JavaScript в конце страницы -->
  <?php require_once 'partials/footer_scripts.php'; ?>
</body>
</html>
