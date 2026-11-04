
<?php
session_start();

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
    <title>Вход в систему</title>

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

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 35px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 15px 45px rgba(30, 64, 175, .12);
        }

        .login-icon {
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
            font-size: 26px;
            color: #172554;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
        }

        .submit-btn {
            width: 100%;
            height: 47px;
            border: none;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .register-link {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #edf0f5;
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }

        .register-link a {
            display: inline-block;
            margin-top: 8px;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="login-icon">🔐</div>

    <h1>Добро пожаловать!</h1>

    <p class="subtitle">Войдите в свой аккаунт</p>

    <form action="login_process.php" method="post">

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="example@mail.com"
                autocomplete="username"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Введите пароль"
                autocomplete="current-password"
                required
            >
        </div>

        <button type="submit" class="submit-btn">
            Войти в систему
        </button>

    </form>

    <div class="register-link">
        Нет аккаунта?
        <br>
        <a href="register.php">Зарегистрироваться →</a>
    </div>

    <div class="footer">
        © <?= date('Y') ?> Школьный журнал
    </div>

</div>

</body>
</html>
