<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/formregistration.css">
</head>

<body>
    <div class="rectangle">
        <form action="/lib/reg.php" method="post">
            <p>
                <label for="name" class="text">Имя</label>
                <input id="name" type="text" name="name">
            </p>
            <p>
                <label for="surname" class="text">Фамилия</label>
                <input id="surname" type="text" name="surname">
            </p>
            <p>
                <label for="email" class="text">E-mail</label>
                <input id="email" type="text" name="email">
            </p>
            <p>
                <label for="login" class="text">Логин</label>
                <input id="login" type="text" name="login">
            </p>
            <p>
                <label for="password" class="text">Пароль</label>
                <input id="password" type="text" name="password">
            </p>
            <p>
                <label for="confirm" class="text">Повторите пароль</label>
                <input id="confirm" type="text" name="confirm">
            </p>
            <p>
                <button class="but" type="submit">Регистрация</button>
            </p>
        </form>
    </div>
</body>

</html>