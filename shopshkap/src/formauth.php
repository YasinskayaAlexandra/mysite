<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="utf-8">
    <title>Вход</title>
    <link rel="stylesheet" href="/css/formregistration.css">
</head>

<body>
    <div class="rectangle">
        <form action="/lib/auth.php" method="post">
            <p>
                <label for="login" class="text">Логин</label>
                <input id="login" type="text" name="login">
            </p>
            <p>
                <label for="password" class="text">Пароль</label>
                <input id="password" type="text" name="password">
            </p>
            <p>
                <button class="but" type="submit">Войти</button>
            </p>
        </form>
    </div>
</body>

</html>