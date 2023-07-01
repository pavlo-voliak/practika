<?php
$email = filter_var(trim($_POST['email']));
$pass = filter_var(trim($_POST['pass']));


$pass = md5($pass . "fks33jd8djx");

$mysql = new mysqli('localhost', 'root', '2004', 'register');

$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");

$user = $result->fetch_assoc();

if ($user === null) {
    if ($result->num_rows === 0) {
        echo "Ви ввели неправильний email. Щоб повернутися назад, натисніть <a href='lab16.41.html'>тут</a>.";
    } else {
        echo "Ви ввели неправильний пароль. Щоб повернутися назад, натисніть <a href='lab16.41.html'>тут</a>.";
    }
    exit();
}

setcookie('user', $user['pass'], time() + 3600, "/");

$mysql->close();

header('Location: /site/index.html');
?>