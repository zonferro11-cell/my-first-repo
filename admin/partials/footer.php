<?php
/**
 * footer.php — подвал страницы (нижняя полоска с копирайтом).
 */
?>
<!-- Подвал -->
<div class="footer">
  <!-- Строка Bootstrap: элементы по краям и по центру по вертикали -->
  <div class="row justify-content-between align-items-center">
    <!-- Левая колонка: копирайт -->
    <div class="col">
      <!-- date('Y') — текущий год, выводится автоматически -->
      <p class="fs-6 mb-0">&copy; <?php echo date('Y'); ?> Автоматизация школы. Designed by Ali Valiev</p>
    </div>
  </div>
</div>
<!-- Конец подвала -->
