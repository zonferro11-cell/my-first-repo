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

<p><strong>Description:</strong> <?php echo htmlspecialchars($info["description"]); ?></p>
<p><strong>Address:</strong> <?php echo htmlspecialchars($info["address"]); ?></p>
<p><strong>Phone:</strong> <?php echo htmlspecialchars($info["phone"]); ?></p>

<p><strong>Email:</strong> <?php echo htmlspecialchars($info["email"]); ?></p>


