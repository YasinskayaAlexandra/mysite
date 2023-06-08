<?
session_start();
?>
<!DOCTYPE html>
<html lang="rus">

<head>
    <meta charset="UTF-8">
    <title>Шкап - Интернет магазин|Каталог для женщин</title>
    <link rel="stylesheet" href="/syles/index.css">
</head>

<body>
    <header>
        <nav>
            <div class="buttons">
                <a href="/src/catalog.php">
                    <div class="but">Каталог</div>
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
            <a href="/index.php">
                <div class="logo">
                    <img src="/img/лого.svg" alt="">
                </div>
            </a>
        </div>
    </header>
    <div class="content">
        <div class="product">
            <?
            require "C:\OpenServer\domains\shopshkap\lib\connect.php";
            $queryProduct = "SELECT * FROM `products` where `products`.`gencat` = 'Мужская одежда'";
            $result = mysqli_query($db, $queryProduct);
            $products = array();
            while ($productInfo =  mysqli_fetch_assoc($result)) {
                $products[] = $productInfo;
            }
            foreach ($products as $product) { ?>
                <div class="item">
                    <div class="img"><img src="<?= $product["prodfoto"]; ?>"></div>
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
                    <form class="td" action="/src/prodview.php" method="post">
                        <input type="hidden" name="id" value="<?= $product["id"]; ?>">
                        <button class="butt" type="submit">Подробнее</button>
                    </form>
                    <form class="td" action="/lib/addcart.php" method="post">
                        <input type="hidden" name="id" value="<?= $product["id"]; ?>">
                        <button class="butt" type="submit">В корзину</button>
                    </form>
                </div>
            <?
            } ?>
        </div>
    </div>
</body>

</html>