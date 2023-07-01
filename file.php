<?php
$email = filter_var(trim($_POST['email']));
$pass = filter_var(trim($_POST['pass']));


$pass = md5($pass . "fks33jd8djx");

$mysql = new mysqli('localhost', 'root', '2004', 'register');

$existingUser = $mysql->query("SELECT * FROM users WHERE email = '$email'");

if ($existingUser->num_rows > 0) {
    echo 'Такий користувач вже існує. <a href="lab16.4.html">Щоб вернутися назад, натисніть тут</a>.';
    exit();
} else {
    $query = "INSERT INTO `users` (`email`, `pass`) VALUES ('$email', '$pass')";

    if ($mysql->query($query) === TRUE) {
        echo "Користувач успішно зареєстрований";
        header('Location: /site/index.html');
    } else {
        echo "Помилка при реєстрації користувача: " . $mysql->error;
    }
}

$mysql->close();
?>
