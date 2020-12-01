<?php
include_once('config.php');
if (isset($_POST['ok'])){

	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');

	$producator=$_POST['producator'];
	$model=$_POST['model'];
	$tip_motor=$_POST['tip_motor'];
	$sql='INSERT INTO masina(producator,model,tip_motor) VALUES (:prod,:mod,:tip)';
	//$sql="INSERT INTO masina(producator,model,tip_motor) VALUES ('".$producator."','".$model."','".$tip_motor."')";

	//echo $sql;
	//mysqli_query($conn,$sql);
	///*
	$query= $dbh -> prepare($sql);
	//echo $producator;
    $query-> bindParam(':prod', $producator, PDO::PARAM_STR);
    //echo $producator;
    $query-> bindParam(':mod', $model, PDO::PARAM_STR);
    $query-> bindParam(':tip', $tip_motor, PDO::PARAM_STR);
  //  echo $query->queryString;
    
    $query-> execute();

    echo '
    	<script>
    		window.location.href = "admin.php";
    	</script>
    ';
  //  */

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Adauga Masina</title>
	<link rel="stylesheet" href="adaugaMasina.css">
</head>
<body>
	<?php include('topClient.php'); ?>
	
	<link rel="stylesheet" href="client.css">
	<form action="" method="post">
	
	<label>Producator</label><br>
	<input type="text" name="producator"><br>
	
	<label>Model</label><br>
	<input type="text" name="model"><br>
	
	<label>Tip_Motor</label><br>
	<select name="tip_motor">
		<option value="benzina">Benzina</option>
		<option value="diesel" >Diesel</option>
	</select>
	<br><br>
	
	<input  class = "Butonel1" type="submit" name="ok" value="Adauga">
</form>
<button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
</body>
	<?php include('bottomClient.php'); ?>
</html>

	<script>

			function back(){
					window.location.href = "admin.php";
			}

	</script>



