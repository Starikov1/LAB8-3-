<?php

$mysqli = new mysqli('localhost', 'root', '', 'enterprises'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8

if (mysqli_connect_errno()) {
    printf("Підключення до сервера не вдалось. Код помилки: %s\n", mysqli_connect_error());
    exit;
}


$CPassport = $_POST['CPassport'];
$Passport = $_POST['Passport'];
$TaxCode = $_POST['TaxCode'];
$department_id_worker = $_POST['department_id_worker'];

$sql = "UPDATE director_other SET Passport='$Passport', TaxCode='$TaxCode', department_id_worker='$department_id_worker' WHERE Passport='$CPassport'";


if($mysqli->query($sql)){
    echo "Рядок змінено успішно";
    }
else
    {
        echo "Error" . $sql . "<br/>" . $mysqli->error;
    }



/*Закриваємо з'єднання*/
$mysqli->close();

include("showDirector_Other.php")
?>
