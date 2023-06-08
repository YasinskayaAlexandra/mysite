<?php
session_start();
?>
<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>GoldBriliants|Товар</title>
    <link rel="stylesheet" href="/syles/cart.css">
</head>

<body>
    <header>
        <nav>
            <div class="buttons">
                <a href="/index.php">
                    <div class="but">Главная страница</div>
                </a>
            </div>
            <div class="buttons">
                <a href="/src/catalog.php">
                    <div class="but">Каталог</div>
                </a>
            </div>
            <div class="buttons">
                <a href="/src/aboutus.php">
                    <div class="but">О нас</div>
                </a>
            </div>
            <? if (isset($_SESSION['user'])) {
                if (($_SESSION['user']['role'] == 'admin') == true) { ?>
                    <a href="/admin.php">
                        <div class="but">Администраторская панель</div>
                    </a><? }
                } ?>
            <? if (($_SESSION['user'] ?? '') === '') { ?>
                <div class="buttons">
                    <a href="/src/formreg.php">
                        <div class="but">Регистрация</div>
                    </a>
                    <a href="/src/formauth.php">
                        <div class="but">Войти</div>
                    </a>
                </div>
            <? } else { ?>
                <div class="buttons">
                    <a href="/src/profile.php">
                        <div class="but">Профиль</div>
                    </a>
                    <a href="/lib/logout.php">
                        <div class="but">Выход</div>
                    </a>
                </div>
            <? } ?>
        </nav>
        <div class="header">
            <div class="logo">
                <a href="/index.php"><img src="/img/лого.svg" alt=""></a>
            </div>
            <div class="slogan">
                <h1>«Мода проходит, стиль вечен» — Ив Сен-Лоран (дизайнер)</h1>
            </div>
        </div>
    </header>
    <div class="product">
        <?
        require "C:\OpenServer\domains\shopshkap\lib\connect.php";
        $id = $_POST["id"];
        $queryProduct = "SELECT * FROM `products` where `products`.`id` = '$id'";
        $result = mysqli_query($db, $queryProduct);
        $products = array();
        while ($productInfo =  mysqli_fetch_assoc($result)) {
            $products[] = $productInfo;
        }
        foreach ($products as $product) { ?>
            <div class="item">
                <div class="img">
                    <img src="<?= $product["prodfoto"]; ?>">
                    <!-- <img src="<? //= $product["prodfoto1"]; 
                                    ?>">
                    <img src="<? //= $product["prodfoto2"]; 
                                ?>">
                    <img src="<? //= $product["prodfoto3"]; 
                                ?>"> -->
                </div>
                <div class="about">
                    <div class="td"><?= $product["name"]; ?></div>
                    <div class="td"><?= $product["about"]; ?></div>
                    <div class="price">
                        <?
                        if ($product["sale"] !== null && $product["sale"] !== '0') {
                            $price = $product["price"];
                            $percent = $product["sale"];
                            $cost = $price - ($price * ($percent / 100)); ?>
                            <div class="tdprice" style="color:#7d7d7d"><s><?= $product["price"]; ?> Руб</s></div>
                            <div class="tdprice" style="color:#f00"><?= $cost; ?> Руб</div><?
                                                                                        } else {
                                                                                            $cost = $product["price"]; ?>
                            <div class="tdprice"><?= $cost; ?> Руб</div><?
                                                                                        }
                                                                        ?>
                    </div>
                </div>
                <form class="td" action="/lib/addcart.php" method="post">
                    <input type="hidden" name="prod" value="<?= $product["id"]; ?>">
                    <button class="butt" type="submit">В корзину</button>
                </form>
            </div>
        <?
        } ?>
    </div>
    <footer>
        <div class="info">
            <p>Правообладателем является команда портных,для которых был разарботан сайт</p>
            <p>Контактный номер: 8-923-123-45-67</p>
            <p>Адрес ателье: г.Красноярс, проспект имени Газеты Красноярский Рабочий, 199</p>
        </div>
        <div class="sil">
            <a href="/index.php">
                <div class="sl">Главная страница</div>
            </a>
            <a href="/src/catalog.php">
                <div class="sl">Каталог</div>
            </a>
            <a href="/src/aboutus.php">
                <div class="sl">О нас</div>
            </a>
        </div>
    </footer>
</body>

</html>