<?php

$mysqli = new mysqli('localhost', 'root', '', 'enterprises'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8

if (mysqli_connect_errno()) {
    printf("Підключення до сервера не вдалось. Код помилки: %s\n", mysqli_connect_error());
    exit;
}

$Passport = $_POST['Passport']; $TaxCode = $_POST['TaxCode']; $director_Passport_id = $_POST['director_Passport_id']; $director_department_id=$_POST['director_department_id'];

$sql = "INSERT INTO Employee_Other (Passport,TaxCode,director_Passport_id, director_department_id) VALUES ('$Passport', '$TaxCode','$director_Passport_id', '$director_department_id')";


if($mysqli->query($sql)){
    echo "Рядок вставлено успішно";
    }
else
    {
        echo "Error" . $sql . "<br/>" . $mysqli->error;
    }



/*Закриваємо з'єднання*/
$mysqli->close();

include("showEmployee_Other.php")
?>