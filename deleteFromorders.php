<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Вставка даних</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include("showEmployee_Name.php");
		if (isset($_POST['delete']))
		{
			$pdoConnect=new PDO("mysql:host=localhost;dbname=enterprises","root","");
			
			$id=$_POST['id'];
			
			$pdoQuery="DELETE FROM orders WHERE id='$id'";
			
			$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$pdoResult=$pdoConnect->prepare($pdoQuery);
			
			$pdoExec=$pdoResult->execute(array(":"=>$id));
			
			if ($pdoExec)
			{
				echo "Data deleted";
			}
		}
    ?>

<form action="deleteFromO.php" method="post">
        <label>Passport</label><input name="Passport" type="text"><br>
        <input type="submit" value="Видалити рядок">
</form>

</body>
</html>