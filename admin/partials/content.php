<?php
/**
 * content.php — выбирает, какую страницу показать.
 * Смотрим на параметр page в адресе (index.php?page=...) и подключаем нужный файл.
 * Если page нет — показываем главную (dashboard.php).
 */


if (isset($_GET['page']) && isset($_SESSION["id"]) && $_SESSION["role"]=="admin") {
    $page = $_GET['page'];
     
    // ---------- Классы ----------
    if ($page == "classes") {
        require_once "classes/index.php";   // список классов
    } elseif ($page == "addClass") {
        require_once "classes/add.php";     // форма добавления класса
    } elseif ($page == "editClass") {
        require_once "classes/edit.php";    // форма изменения класса
    }

    // ---------- Предметы ----------
    elseif ($page == "subjects") {
        require_once "subjects/index.php";  // список предметов
    } elseif ($page == "addSubject") {
        require_once "subjects/add.php";    // форма добавления предмета
    } elseif ($page == "editSubject") {
        require_once "subjects/edit.php";   // форма изменения предмета
    }

    // ---------- Ученики ----------
    elseif ($page == "students") {
        require_once "students/index.php";  // список учеников
    } elseif ($page == "addStudent") {
        require_once "students/add.php";    // форма добавления ученика
    } elseif ($page == "editStudent") {
        require_once "students/edit.php";   // форма изменения ученика
    }

        // ---------- school info ----------
       else if($page=="schoolInfo"){
        require_once "school_info/info.php"; 
       }
       else if($page=="schoolInfoEdit"){
        require_once "school_info/edit.php"; 
       }
       else if($page=="schoolInfoUpdate"){
        require_once "school_info/update.php"; 
       }

       // teacher subjects

       else if ($page=="teacher_subjects") {
           require_once("teacher_subjects.php");
       }
         // journal
       else if ($page=="journal") {
        require_once("journal.php");
        }
         // timetable
        else if ($page=="timetable") {
            require_once("timetable.php");
        }
       


    // Если такой страницы нет — показываем главную
    else {
        require_once "dashboard.php";
    }
} else {
    echo "eror";
}
