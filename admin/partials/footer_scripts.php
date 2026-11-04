<?php
/**
 * footer_scripts.php — JavaScript, который подключается в конце страницы.
 * Скрипты ставят в конец, чтобы HTML загрузился раньше и страница открывалась быстрее.
 */
?>
<!-- Библиотеки шаблона: jQuery, Bootstrap, боковое меню и др. -->
<script src="../assets/admin/js/vendor.min.js"></script>

<!-- Основной JS шаблона Front -->
<script src="../assets/admin/js/theme.min.js"></script>

<script>
  // (function(){ ... })() — функция, которая сразу выполняется (чтобы не засорять глобальные переменные)
  (function () {
    // Ждём полной загрузки страницы
    window.onload = function () {
      // Включаем боковое меню (сворачивание/разворачивание)
      new HSSideNav('.js-navbar-vertical-aside').init();

      // Включаем выпадающие списки Bootstrap (dropdown)
      HSBsDropdown.init();
    };
  })();
</script>

<!-- Переключатель темы (светлая / тёмная / как в системе) -->
<script>
  (function () {
    // Кнопка, по которой открывается выбор темы
    const $dropdownBtn = document.getElementById('selectThemeDropdown');
    // Все пункты выбора темы внутри выпадающего меню
    const $variants = document.querySelectorAll('[aria-labelledby="selectThemeDropdown"] [data-icon]');

    // Подсвечивает выбранную тему и ставит её иконку на кнопку
    const setActiveStyle = function () {
      // Перебираем все пункты меню
      $variants.forEach(function ($item) {
        // Если это текущая тема
        if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
          // Ставим иконку темы на кнопку
          $dropdownBtn.innerHTML = '<i class="' + $item.getAttribute('data-icon') + '"></i>';
          // Делаем пункт активным и выходим
          return $item.classList.add('active');
        }
        // Остальные пункты делаем неактивными
        $item.classList.remove('active');
      });
    };

    // При клике по пункту — включаем выбранную тему
    $variants.forEach(function ($item) {
      $item.addEventListener('click', function (event) {
        event.preventDefault();                                    // не переходим по ссылке "#"
        HSThemeAppearance.setAppearance($item.getAttribute('data-value')); // меняем тему
      });
    });

    // Подсвечиваем текущую тему при загрузке страницы
    setActiveStyle();

    // Когда тема поменялась — обновляем подсветку
    window.addEventListener('on-hs-appearance-change', setActiveStyle);
  })();
</script>
