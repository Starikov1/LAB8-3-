<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Вставка даних</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="insertIntoo.php" method="post">
        <label>id</label><input name="id" type="text"><br>
        <label>Kind</label><input name="Kind" type="text"><br>
		<label>Price</label><input name="Price" type="text"><br>
		<label>PEmployee</label><input name="PEmployee" type="text"><br>
        <input type="submit" value="Вставити рядок">
    </form>

	<?php
        include("showorders.php");
		$mysqli = mysqli_connect('localhost', 'root', '', 'enterprises'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
		$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8
		if($result = $mysqli->query("INSERT INTO orders(id,Kind,Price,PEmployee) VALUES('$id','$Kind', '$Price', '$PEmployee');")) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит

		if($mysqli->query("INSERT INTO orders(id,Kind,Price,PEmployee) VALUES('$id','$Kind', '$Price', '$PEmployee');")){};
          // <br> в html - розрив рядка
        printf("<table><tr><th>id</th><th>Kind</th><th>Price</th><th>PEmployee</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td>
			<td>%s</td></tr>", $row['id'], $row['Kind'], $row['Price'], $row['PEmployee']); //виводимо результат на сторінку
        };
        printf("</table>");
        /*Звільняємо пам'ять*/
        $result->close();
    }
    ?>

</body>
</html>
