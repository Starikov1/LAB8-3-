<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Таблиця employee_other</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Таблиця employee_other</h1>

    <?php

    $mysqli = new mysqli('localhost', 'root', '', 'enterprises'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
	$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8
    
    if (mysqli_connect_errno()) {
    printf("Підключення до сервера не вдалось. Код помилки: %s\n", mysqli_connect_error());
    exit;
    }

    /* Надсилаємо запит серверу */
    if($result = $mysqli->query('SELECT * FROM employee_other')) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит
  // <br> в html - розрив рядка
        printf("<table><tr><th>Passport</th><th>TaxCode</th><th>director_Passport_id</th><th>director_department_id</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row['Passport'], $row['TaxCode'], $row['director_Passport_id'], $row['director_department_id']); //виводимо результат на сторінку
        };
        printf("</table>");
        /*Звільняємо пам'ять*/
        $result->close();
    }

    /*Закриваємо з'єднання*/
    $mysqli->close();
    ?>

    <br><br><br>

    <ul>
        <li><a href="insertIntoEOForm.php">Вставити рядок</a><br></li>
        <li><a href="updateStudentsForm.php">Змінити рядок</a><br></li>
        <li><a href="deleteFromEO.php">Видалити рядок</a><br></li>
        <li><a href="showStudentsGroupsKurators.php">Звіт Студенти - Групи - Куратори</a><br></li>
        <li><a href="index.html">На головну</a><br></li>
    </ul>
    
</body>
</html>
