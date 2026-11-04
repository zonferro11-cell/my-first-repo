<?php

$id=$_POST["id"];
$description=$_POST["description"];
$address=$_POST["address"];
$email=$_POST["email"];
$phone=$_POST["phone"];



$query = "UPDATE school_info
          SET description = '$description', address = '$address', phone = $phone, email = '$email'
          WHERE id = $id;";
mysqli_query($conn, $query);



?>