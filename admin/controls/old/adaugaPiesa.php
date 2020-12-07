<?php 
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');

	if(isset($_POST['masina']) && isset($_POST['denumire']) && isset($_POST['pret']) ){

			$calea = "images/".$_FILES["img_path"]["name"];
			move_uploaded_file($_FILES["img_path"]["tmp_name"], $calea);
			$blob = addslashes(file_get_contents($calea));
		 	$query="INSERT INTO piesa(id_masina,pret,denumire,img) VALUES ('".$_POST['masina']."','".$_POST['pret']."','".$_POST['denumire']."','".$blob."')";
		
		 	/*
		 	$query="INSERT INTO piesa(id_masina,pret,denumire) VALUES ('".$_POST['masina']."','".$_POST['pret']."','".$_POST['denumire']."')";
		 	
		 	*/

		 	echo "<a>".$query."</a>";

		mysqli_query($conn,$query);
		
		echo '
    	<script>
    		window.location.href = "admin.php";
    	</script>
    ';
	

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="adaugaMasina.css">
</head>
<body>
	<?php include('topClient.php'); ?>
	<link rel="stylesheet" href="client.css">
		<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
			<p>Alege Modelul de Masina</p>
			 <select name="masina">
 				<?php 
 					$checkMasina = mysqli_query($conn,"SELECT * from masina");
	   				 while($row = mysqli_fetch_array($checkMasina)){
	   				 	echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
	   				 }
 				?>
			</select><br>
			<p>Denumire</p><input type="text" name="denumire"><br>
			<p>Pret in RON</p><input type="text" name="pret"><br>
			<p>Imagine max=500kb</p><input class = "Butonel1" type="file" name="img_path"><br>
		<input  class = "Butonel1" type="submit" name="ok" value="Adauga">
		</form>
		<button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
			<?php include('bottomClient.php'); ?>

</body>
</html>

	
<script>

			function back(){
					window.location.href = "admin.php";
			}

	</script>

