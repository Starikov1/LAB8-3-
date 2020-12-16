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
        include("showDirector_Other.php");
		if (isset($_POST['insert']))
		{
			$pdoConnect=new PDO("mysql:host=localhost;dbname=enterprises","root","");
			
			$Passport=$_POST['Passport'];
			$TaxCode=$_POST['TaxCode'];
			$department_id_worker=$_POST['department_id_worker'];
			
			$pdoQuery="INSERT INTO `director_other`(`Passport`,`TaxCode`,`department_id_worker`) VALUES(:Passport,:TaxCode,:department_id_worker)";
			
			$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$pdoResult=$pdoConnect->prepare($pdoQuery);
			
			$pdoExec=$pdoResult->execute(array(":Passport"=>$Passport, ":TaxCode"=>$TaxCode, ":department_id_worker"=>$department_id_worker));
			
			if ($pdoExec)
			{
				echo "Data inserted.";
			}
		}
    ?>

    <form action="insertIntoDirector_Other.php" method="post">
        <label>Passport</label><input name="Passport" type="text"><br>
        <label>TaxCode</label><input name="TaxCode" type="text"><br>
		<label>department_id_worker</label><input name="department_id_worker" type="text"><br>
		<label>Name</label><input name="Name" type="text"><br>
        <input type="submit" name='insert' value="Вставити рядок">
    </form>
	
	

</body>
</html>
