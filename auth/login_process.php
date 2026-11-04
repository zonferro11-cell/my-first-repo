<?php

require_once('../conn.php');
    session_start();

if (isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password'])) 
{
    $email =  $_POST['email']; 
    $password =  $_POST['password']; 

    $query = "SELECT * FROM users WHERE email = '$email'; ";

    $result  = mysqli_query($conn,$query);
    $row =  mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password_hash"])) {
    $_SESSION["email"] = $row["email"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["full_name"] = $row["full_name"];
    $_SESSION["role"] = $row["role"];
} else {
    echo 'Invalid password.';
}

}



?>