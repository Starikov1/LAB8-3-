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
        include("showcompany.php");
		if (isset($_POST['delete']))
		{
			$pdoConnect=new PDO("mysql:host=localhost;dbname=enterprises","root","");
			
			$department_ID_worker=$_POST['department_ID_worker'];
			
			$pdoQuery="DELETE FROM department WHERE department_ID_worker='$department_ID_worker'";
			
			$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$pdoResult=$pdoConnect->prepare($pdoQuery);
			
			$pdoExec=$pdoResult->execute(array(":"=>$id));
			
			if ($pdoExec)
			{
				echo "Data deleted";
			}
		}
    ?>

<form action="deleteFromComp.php" method="post">
        <label>id_worker</label><input name="id_worker" type="text"><br>
        <input type="submit" value="Видалити рядок">
</form>

</body>
</html>