

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	 <link rel="stylesheet" href="admin.css">
</head>
<body>
	<?php include('../common/topClient.php'); ?>
	<link rel="stylesheet" href="client.css">
	<div>
		<ul>
			<li><a href="adaugaPiesa.php" >Adauga Piesa</a></li>
			<br/>
			<li><a href = "adaugaMasina.php">Adauga Masina</a></li>
			<br/>
			<li><a href="editeazaMasini.php">Editeaza Masini</a></li>
			<br/>
			<li><a href="editeazaPiese.php">Editeaza Piese</a></li>
			<br/>
			<li><a href="stergeMasina.php">Sterge Masina</a></li>
			<br/>
			<li><a href="stergePiesa.php">Sterge Piese</a></li>
		</ul>
	</div>
	<?php include('../common/bottomClient.php'); ?>
</body>
</html>