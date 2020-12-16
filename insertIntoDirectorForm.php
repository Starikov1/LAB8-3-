<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Вставка даних</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="insertIntoStudents.php" method="post">
        <label>Passport</label><input name="Passport" type="text"><br>
        <label>TaxCode</label><input name="TaxCode" type="text"><br>
		<label>department_id_worker</label><input name="department_id_worker" type="text"><br>
        <input type="submit" value="Вставити рядок">
    </form>

	<?php
        include("showDirector_Other.php");
		$mysqli = mysqli_connect('localhost', 'root', '', 'enterprises'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
		$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8
		if($result = $mysqli->query("INSERT INTO Director_Other(Passport,TaxCode,department_id_worker) VALUES('$Passport','$TaxCode','$department_id_worker'); INSERT INTO Director_Name(Passport,Name) VALUES('$Passport','$Name');")) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит

		if($mysqli->query("INSERT INTO Director_Name(Passport,Name) VALUES('$Passport','$Name');")){};
        printf("Список студентів: <br><br>");  // <br> в html - розрив рядка
        printf("<table><tr><th>Passport</th><th>TaxCode</th><th>department_id_worker</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row['Passport'], $row['TaxCode'], $row['department_id_worker']); //виводимо результат на сторінку
        };
        printf("</table>");
        /*Звільняємо пам'ять*/
        $result->close();
    }
	if($result=$mysqli->query("INSERT INTO Director_Name(Passport,Name) VALUES('$Passport','$Name');"))
	{
		
	}
    ?>

</body>
</html>
