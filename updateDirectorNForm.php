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
        include("showDirector_Name.php"); 
if (isset($_POST['update']))
		{
			$pdoConnect=new PDO("mysql:host=localhost;dbname=enterprises","root","");
			
			$Passport=$_POST['Passport'];
			
			$pdoQuery="UPDATE director_other SET Passport='$Passport', TaxCode='$TaxCode', department_id_worker='$department_id_worker' WHERE Passport='$CPassport'";
			
			$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$pdoResult=$pdoConnect->prepare($pdoQuery);
			
			$pdoExec=$pdoResult->execute(array(":"=>$CPassport, ":"=>$Passport, ":"=>$TaxCode, ":"=>$department_id_worker));
			
			if ($pdoExec)
			{
				echo "Data updated";
			}
		}		
    ?>

<form action="updateDirectorN.php" method="post">
        <label>Changing passport</label><input name="CPassport" type="text"><br>
        <label>Name</label><input name="Name" type="text"><br>
		<label>Passport</label><input name="Passport" type="text"><br>
        <input type="submit" value="Змінюємо рядок">
</form>

</body>
</html>