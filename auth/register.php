
<?php
session_start();
require_once("../conn.php");
$query = "SELECT * FROM classes;";
$result = mysqli_query($conn, $query);
if (isset($_SESSION['uid'])) {
    header("Location: ../admin/");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #dbeafe);
        }

        .register-card {
            width: 100%;
            max-width: 420px;
            padding: 35px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 15px 45px rgba(30, 64, 175, .12);
        }

        .icon {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: #eff6ff;
            border-radius: 16px;
            font-size: 30px;
        }

        h1 {
            text-align: center;
            color: #172554;
            font-size: 26px;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        select{
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
        }

        .submit-btn {
            width: 100%;
            height: 47px;
            margin-top: 5px;
            border: none;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .login-link {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #edf0f5;
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }

        .login-link a {
            display: inline-block;
            margin-top: 8px;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<div class="register-card">

    <div class="icon">👤</div>

    <h1>Создать аккаунт</h1>

    <p class="subtitle">Заполните данные для регистрации</p>

    <form action="register_process.php" method="post">

        <div class="form-group">
            <label for="full_name">Полное имя</label>
            <input
                type="text"
                name="full_name"
                id="full_name"
                placeholder="Введите ваше имя"
                required
                minlength="2"
            >
        </div>

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="example@mail.com"
                autocomplete="email"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Минимум 8 символов"
                minlength="8"
                autocomplete="new-password"
                required
            >
        </div>
          <div class="form-group">
            <label for="password">Class</label>
            <select name="class_id" class="input">
           <?php
                 while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <option value="<?php echo $row["id"]; ?></option>"><?php echo $row["title"]; ?></option>
              <?php
                 }
           ?>
            </select>
        </div>

        <button type="submit" class="submit-btn">
            Зарегистрироваться
        </button>

    </form>

    <div class="login-link">
        Уже есть аккаунт?
        <br>
        <a href="login.php">← Войти в систему</a>
    </div>

    <div class="footer">
        © <?= date('Y') ?> Школьный журнал
    </div>

</div>

</body>
</html>
