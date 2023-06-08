<?
$db = mysqli_connect(
    '127.0.0.1:3306',
    'root',
    '',
    'shopshkap'
);
if (!$db) {
    die('это не работает');
}
