<?php
$weekDays = [
    ['short' => 'ПН', 'name' => 'Понедельник'],
    ['short' => 'ВТ', 'name' => 'Вторник'],
    ['short' => 'СР', 'name' => 'Среда'],
    ['short' => 'ЧТ', 'name' => 'Четверг'],
    ['short' => 'ПТ', 'name' => 'Пятница'],
    ['short' => 'СБ', 'name' => 'Суббота'],
];

$lessonTimes = [
    1 => ['08:00:00', '08:45:00'],
    2 => ['08:25:00', '10:10:00'],
    3 => ['9:20:00', '11:05:00'],
    4 => ['10:15:00', '12:00:00'],
    5 => ['11:10:00', '12:55:00'],
    6 => ['12:05:00', '13:50:00'],
];

$selectedClass = (int)($_POST['class_id'] ?? 0);

if (isset($_POST['save'])) {
    if ($selectedClass <= 0) {
        echo '<div class="alert alert-danger">Выберите класс</div>';
    } else {
        $subjects = $_POST['subject_id'] ?? [];
        $teachers = $_POST['teacher_id'] ?? [];
        $rooms    = $_POST['room'] ?? [];

        $del = mysqli_prepare($conn, "DELETE FROM schedule WHERE class_id = ?");
        mysqli_stmt_bind_param($del, "i", $selectedClass);
        mysqli_stmt_execute($del);

        $stmt = mysqli_prepare($conn, "INSERT INTO schedule (class_id, subject_id, teacher_id, day_of_week, lesson_number, start_time, end_time, room) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        foreach ($subjects as $day => $lessons) {
            foreach ($lessons as $num => $subjectId) {
                $teacherId = $teachers[$day][$num] ?? '';
                if ($subjectId === '' || $teacherId === '') {
                    continue; // пустые строки не сохраняем
                }
                $c  = $selectedClass;
                $s  = (int)$subjectId;
                $t  = (int)$teacherId;
                $d  = (int)$day;
                $n  = (int)$num;
                $st = $lessonTimes[$n][0] ?? '00:00:00';
                $en = $lessonTimes[$n][1] ?? '00:00:00';
                $r  = preg_replace('/\D/', '', $rooms[$day][$num] ?? ''); // ИЗМЕНЕНО: только цифры
                $r  = ($r !== '') ? $r : null;

                mysqli_stmt_bind_param($stmt, "iiiiisss", $c, $s, $t, $d, $n, $st, $en, $r);
                mysqli_stmt_execute($stmt);
            }
        }
        echo '<div class="alert alert-success">Расписание сохранено</div>';
    }
}

$classes_result = mysqli_query($conn, "Select * from classes");
?>
<div class="d-flex align-items-center mb-3">
    <h1 class="h3 mb-0">Расписание</h1>
</div>

<form method="post">

<div class="mb-3">
    <label class="form-label">Класс</label>
    <select class="form-select" name="class_id" required>
        <option value="">Выберите класс</option>
        <?php while ($class_row = mysqli_fetch_assoc($classes_result)) { ?>
            <option value="<?=$class_row['id'];?>" <?= $selectedClass == $class_row['id'] ? 'selected' : '' ?>>
                <?=$class_row['title'];?>
            </option>
        <?php } ?>
    </select>
</div>

<div class="row g-3">
    <?php foreach ($weekDays as $dayIndex => $day) { $dayNum = $dayIndex + 1; /* ИЗМЕНЕНО: номер дня 1..6 */ ?>
        <div class="col-12 col-lg-6">
            <section class="card h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center gap-3 border-bottom pb-3 mb-3">
                        <span class="badge rounded-pill bg-light text-success fs-6"><?php echo $day['short']; ?></span>
                        <h2 class="h5 mb-0"><?php echo $day['name']; ?></h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Предмет</th>
                                    <th scope="col">Учитель</th>
                                    <th scope="col">Аудитория</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query = "Select * from subjects";
                                $q_teacher= "Select * from users where role='teacher'";
                                
                                                                
                                for ($i = 1; $i <= 6; $i++) { 
                                    $result = mysqli_query($conn, $query);
                                    $teacher_result = mysqli_query($conn, $q_teacher);
                                    ?>
                                    <tr>
                                        <th scope="row" class="text-secondary"><?=$i ?></th>
                                        <td>
                                            <!-- ИЗМЕНЕНО: name -->
                                            <select class="form-select" name="subject_id[<?= $dayNum ?>][<?= $i ?>]">
                                                <option value="">Выберите предмет</option>
                                            <?php 
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                 ?>
                                                <option value="<?=$row['id'];?>"><?=$row['title'];?></option>
                                            <?php } ?>
                                        </select>
                                    
                                    
                                    </td>
                                        <td>
                                            <!-- ИЗМЕНЕНО: name -->
                                            <select class="form-select" name="teacher_id[<?= $dayNum ?>][<?= $i ?>]">
                                                <option value="">Выберите преподавателя</option>
                                                <?php 
                                                while ($teacher_row = mysqli_fetch_assoc($teacher_result)) {
                                                     ?>
                                                    <option value="<?=$teacher_row['id'];?>"><?=$teacher_row['full_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <!-- ИЗМЕНЕНО: текстовое поле, принимает только цифры -->
                                        <td><input type="text" class="form-control" maxlength="20" name="room[<?= $dayNum ?>][<?= $i ?>]" placeholder="Каб." inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    <?php } ?>
</div>

<div class="d-flex justify-content-end mt-3">
    <input type="submit" class="btn btn-primary" value="Сохранить" name="save">
</div>
</form>
<!-- ДОБАВЛЕНО: закрытие формы -->