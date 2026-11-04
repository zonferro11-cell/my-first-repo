<?php
/**
 * navbar.php — боковое (вертикальное) меню админки.
 *
 * Пункты меню ведут на index.php?page=..., а content.php решает, что показать.
 */
?>
<!-- Боковое меню. Классы js-navbar-vertical-aside нужны для JS шаблона -->
<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white">
  <div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">

      <!-- Логотип: ведёт на главную страницу админки -->
      <a class="navbar-brand" href="index.php" aria-label="Главная">
        <!-- Логотип для светлой темы -->
        <img class="navbar-brand-logo" src="../assets/admin/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
        <!-- Логотип для тёмной темы -->
        <img class="navbar-brand-logo" src="../assets/admin/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
        <!-- Маленький логотип (когда меню свёрнуто), светлая тема -->
        <img class="navbar-brand-logo-mini" src="../assets/admin/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
        <!-- Маленький логотип, тёмная тема -->
        <img class="navbar-brand-logo-mini" src="../assets/admin/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
      </a>

      <!-- Кнопка "свернуть/развернуть меню" -->
      <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
        <i class="bi-arrow-bar-left navbar-toggler-short-align" title="Свернуть"></i>
        <i class="bi-arrow-bar-right navbar-toggler-full-align" title="Развернуть"></i>
      </button>

      <!-- Содержимое меню -->
      <div class="navbar-vertical-content">
        <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

          <!-- Пункт "Главная" -->
          <div class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="bi-house-door nav-icon"></i>
              <span class="nav-link-title">Главная</span>
            </a>
          </div>

          <!-- Заголовок группы меню -->
          <span class="dropdown-header mt-4">Справочники</span>
          <small class="bi-three-dots nav-subtitle-replacer"></small>

          <div id="navbarVerticalMenuPages">

            <!-- ===== Классы ===== -->
            <div class="nav-item">
              <!-- Заголовок раскрывающегося пункта; data-bs-target — какой блок раскрыть -->
              <a class="nav-link dropdown-toggle"
                 href="#menuClasses" role="button" data-bs-toggle="collapse" data-bs-target="#menuClasses"
                 aria-expanded="false" aria-controls="menuClasses">
                <i class="bi-door-open nav-icon"></i>
                <span class="nav-link-title">Классы</span>
              </a>
              <!-- Раскрывающийся блок с подпунктами -->
              <div id="menuClasses" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenuPages">
                <a class="nav-link" href="?page=classes">Список</a>
                <a class="nav-link" href="?page=addClass">Добавить</a>
              </div>
            </div>

            <!-- ===== Предметы ===== -->
            <div class="nav-item">
              <a class="nav-link dropdown-toggle"
                 href="#menuSubjects" role="button" data-bs-toggle="collapse" data-bs-target="#menuSubjects"
                 aria-expanded="false" aria-controls="menuSubjects">
                <i class="bi-book nav-icon"></i>
                <span class="nav-link-title">Предметы</span>
              </a>
              <div id="menuSubjects" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenuPages">
                <a class="nav-link" href="?page=subjects">Список</a>
                <a class="nav-link" href="?page=addSubject">Добавить</a>
              </div>
            </div>

            <!-- ===== Ученики ===== -->
            <div class="nav-item">
              <a class="nav-link dropdown-toggle"
                 href="#menuStudents" role="button" data-bs-toggle="collapse" data-bs-target="#menuStudents"
                 aria-expanded="false" aria-controls="menuStudents">
                <i class="bi-people nav-icon"></i>
                <span class="nav-link-title">Ученики</span>
              </a>
              <div id="menuStudents" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenuPages">
                <a class="nav-link" href="?page=students">Список</a>
                <a class="nav-link" href="?page=addStudent">Добавить</a>
              </div>
            </div>

             <!-- ===== Ученики ===== -->
             <div class="nav-item">
              <a class="nav-link dropdown-toggle"
                 href="#schoolInfo" role="button" data-bs-toggle="collapse" data-bs-target="#schoolInfo"
                 aria-expanded="false" aria-controls="schoolInfo">
                <i class="bi-people nav-icon"></i>
                <span class="nav-link-title">School Info</span>
              </a>
              <div id="schoolInfo" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenuPages">
                <a class="nav-link" href="?page=schoolInfo">Info</a>
                <a class="nav-link" href="?page=schoolInfoEdit">Edit</a>
              </div>


              <div class="nav-item">
              <a class="nav-link"
                 href="?page=teacher_subjects" role="button" data-bs-toggle="" data-bs-target="#"
                 aria-expanded="false" aria-controls="">
                <i class="bi-book nav-icon"></i>
                <span class="nav-link-title">Предметы учителей</span>
              </a>
              
            </div>

              
                
            <div class="nav-item">
              <a class="nav-link"
                 href="../auth/logout.php" role="button" data-bs-toggle="" data-bs-target="#"
                 aria-expanded="false" aria-controls="">
                <i class="bi-book nav-icon"></i>
                <span class="nav-link-title">Выход</span>
              </a>
              
            </div>
            </div>

          </div>
        </div>
      </div>
      <!-- Конец содержимого меню -->

      <!-- Низ меню: переключатель темы -->
      <div class="navbar-vertical-footer">
        <ul class="navbar-vertical-footer-list">
          <li class="navbar-vertical-footer-list-item">
            <!-- dropup — меню открывается вверх -->
            <div class="dropdown dropup">
              <!-- Кнопка; иконку внутрь вставит JS из footer_scripts.php -->
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"></button>

              <!-- Варианты темы: data-value — название темы, data-icon — иконка -->
              <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                  <i class="bi-moon-stars me-2"></i> Как в системе
                </a>
                <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                  <i class="bi-brightness-high me-2"></i> Светлая
                </a>
                <a class="dropdown-item" href="#" data-icon="bi-moon" data-value="dark">
                  <i class="bi-moon me-2"></i> Тёмная
                </a>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- Конец низа меню -->

    </div>
  </div>
</aside>
