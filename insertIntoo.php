<?php

$mysqli = new mysqli('localhost', 'root', '', 'enterprises'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8

if (mysqli_connect_errno()) {
    printf("Підключення до сервера не вдалось. Код помилки: %s\n", mysqli_connect_error());
    exit;
}

$id = $_POST['id']; $Kind = $_POST['Kind']; $Price = $_POST['Price']; $PEmployee=$_POST['PEmployee'];

$sql = "INSERT INTO orders (id,Kind,Price, PEmployee) VALUES ('$id', '$Kind','$Price', '$PEmployee')";


if($mysqli->query($sql)){
    echo "Рядок вставлено успішно";
    }
else
    {
        echo "Error" . $sql . "<br/>" . $mysqli->error;
    }



/*Закриваємо з'єднання*/
$mysqli->close();

include("showorders.php")
?>