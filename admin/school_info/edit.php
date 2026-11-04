<?php
$query = "SELECT * from school_info;";
$result = mysqli_query($conn, $query);
$info = mysqli_fetch_assoc($result);

?>
<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">School info</h1>
  <a href="" class="btn btn-primary">Edit</a>
</div>

<div class="card">
  <div class="card-body">
    <!-- Форма отправляет данные в students/insert.php -->
    <form action="?page=schoolInfoUpdate" method="post">
     <input type="hidden" name="id" value="<?php echo $info["id"]; ?>">
      <!-- ФИО -->
      <div class="mb-4">
        <label class="form-label">Address</label>
        <input type="text" value="<?php echo $info['address']; ?>" class="form-control" name="address" required>
      </div>

      <!-- Email; type="email" — браузер сам проверит, что это похоже на email -->
      <div class="mb-4">
        <label class="form-label">Email</label>
        <input type="email" value="<?php echo $info['email']; ?>" class="form-control" name="email" required>
      </div>

      <!-- Пароль; type="password" — символы скрыты точками -->
      <div class="mb-4">
        <label class="form-label">Phone</label>
        <input type="number" value="<?php echo $info['phone']; ?>" class="form-control" name="phone" required>
      </div>

      <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea class="form-control"  name="description">
        <?php echo $info["description"]; ?>
        </textarea>
      </div>

     
      <!-- Кнопка отправки формы -->
      <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
  </div>
</div>

</form>