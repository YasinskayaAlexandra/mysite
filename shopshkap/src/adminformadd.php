<?
session_start();
?>
<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>GoldBriliants|Добавление товара</title>
    <link rel="stylesheet" href="/syles/formregistration.css">
</head>

<body>
    <div class="rectangle">
        <form action="/lib/add.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="name" class="text">Название</label>
                <input id="name" type="text" name="name">
            </p>
            <p>
                <label for="about" class="text">Описание</label>
                <textarea id="about" name="about" style="font-size:16px; height: 100px; width: 300px;"></textarea>
            </p>
            <p>
                <label for="price" class="text">Цена</label>
                <input id="price" type="text" name="price">
            </p>
            <p>
                <label for="gencat">Выберите категорию</label>
                <select id="gencat" name="gencat">
                    <option>Мужская одежда</option>
                    <option>Женская одежда</option>
                </select>
            </p>
            <p>
                <label for="category">Выберите раздел</label>
                <select id="category" name="category">
                    <option>Рубашки</option>
                    <option>Штаны</option>
                    <option>Костюмы</option>
                    <option>Блузки</option>
                    <option>Юбки</option>
                    <option>Платья</option>
                </select>
            </p>
            <p>
                <label for="sale">Скидка (если скидки на товар нет, введите "0")</label>
                <input id="sale" type="text" name="sale">
            </p>
            <p>
                <label for="prodfoto">Выберите главное изображение</label>
                <input id="prodfoto" type="file" name="prodfoto">
            </p>
            <p>
                <label for="prodfoto1">Выберите изображение</label>
                <input id="prodfoto1" type="file" name="prodfoto1">
            </p>
            <p>
                <label for="prodfoto2">Выберите изображение</label>
                <input id="prodfoto2" type="file" name="prodfoto2">
            </p>
            <p>
                <label for="prodfoto3">Выберите изображение</label>
                <input id="prodfoto3" type="file" name="prodfoto3">
            </p>
            <p>
                <button class="but" type="submit">Добавить товар</button>
            </p>
        </form>
    </div>
</body>

</html>