<?php
$mysqli = new mysqli('localhost', 'root', '2004', 'register');

if ($mysqli->connect_errno) {
    echo "Помилка підключення до бази даних: " . $mysqli->connect_error;
    exit();
}

$result = $mysqli->query("SELECT * FROM users LIMIT 1");

if (!$result) {
    echo "Помилка запиту: " . $mysqli->error;
    exit();
}

if ($result->num_rows > 0) {
    echo "Підключення до бази даних успішне!";
} else {
    echo "Немає записів у таблиці";
}

$result->free();
$mysqli->close();
?>