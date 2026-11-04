<?php
/**
 * head.php — начало HTML-документа: тег <head>, подключение CSS и настройки темы.
 * Подключается один раз в admin/index.php.
 */
?>
<!DOCTYPE html>
<!-- Язык страницы — русский -->
<html lang="ru">
<head>
  <!-- Кодировка страницы (всегда первой строкой в head) -->
  <meta charset="utf-8">
  <!-- Адаптивность: страница подстраивается под ширину телефона/планшета -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Заголовок во вкладке браузера -->
  <title>Автоматизация школы — админ-панель</title>

  <!-- CSS плагинов шаблона (иконки Bootstrap Icons, select, таблицы и т.д.) -->
  <link rel="stylesheet" href="../assets/admin/css/vendor.min.css">

  <!-- Основной CSS шаблона Front (на основе Bootstrap 5) -->
  <link rel="stylesheet" href="../assets/admin/css/theme.min.css?v=1.0">

  <!-- Светлая и тёмная темы: загружаются заранее, скрипт темы выберет нужную -->
  <link rel="preload" href="../assets/admin/css/theme.min-1.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="../assets/admin/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <!-- Пока тема не загрузилась, страница прозрачна (чтобы не "мигала").
       Скрипт hs.theme-appearance.js сам удалит этот стиль после загрузки темы. -->
  <style data-hs-appearance-onload-styles="">
    * { transition: unset !important; }
    body { opacity: 0; }
  </style>

  <script>
    // Минимальные настройки шаблона: какая тема по умолчанию (default = светлая)
    window.hs_config = {
      themeAppearance: {
        layoutSkin: "default",  // тема страницы
        sidebarSkin: "default"  // тема бокового меню
      }
    };
  </script>
</head>
