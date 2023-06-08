<?
session_start();
require "C:\OpenServer\domains\shopshkap\lib\connect.php";
$id = $_POST['id'];
$queryProduct = "SELECT * FROM `products` WHERE `products`.`id` = '$id'";
$item = mysqli_query($db, $queryProduct);
$item = mysqli_fetch_assoc($item); ?>
<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>GoldBriliants|Изменение товара</title>
    <link rel="stylesheet" href="/syles/formregistration.css">
</head>

<body>
    <div class="rectangle">
        <form action="/lib/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $item["id"]; ?>" />
            <p>
                <label for="name" class="text">Название</label>
                <input id="name" type="text" name="name" value="<?= $item["name"]; ?>">
            </p>
            <p>
                <label for="about" class="text">Описание</label>
                <textarea id="about" name="about" style="font-size:16px; height: 100px; width: 300px;"><?= $item["about"]; ?></textarea>
            </p>
            <p>
                <label for="price" class="text">Цена</label>
                <input id="price" type="text" name="price" value="<?= $item["price"]; ?>">
            </p>
            <p>
                <label for="gencat">Выберите категорию</label>
                <select id="gencat" name="gencat" value="<?= $item["gencat"]; ?>">
                    <option>Мужская одежда</option>
                    <option>Женская одежда</option>
                </select>
            </p>
            <p>
                <label for="category">Выберите раздел</label>
                <select id="category" name="category" value="<?= $item["category"]; ?>">
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
                <input id="sale" type="text" name="sale" value="<?= $item["sale"]; ?>">
            </p>
            <p>
                <label for="prodfoto">Выберите изображение</label>
                <input id="prodfoto" type="file" name="prodfoto">
            </p>
            <p>
                <button class="but" type="submit">Изменить товар</button>
            </p>
        </form>
    </div>
</body>

</html>