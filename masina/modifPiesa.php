<?php 

	
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');


	// echo $_POST['id_piesa'];
	 if(isset($_POST['denumire'])){
	 	$query = "UPDATE piesa SET denumire = '".$_POST['denumire']."' WHERE id_piesa = '".$_POST['id_piesa']."'";
	 	mysqli_query($conn,$query);
	 }
	 if(isset($_POST['pret'])){
	 	$query = "UPDATE piesa SET pret = '".$_POST['pret']."' WHERE id_piesa = '".$_POST['id_piesa']."'";
	 	mysqli_query($conn,$query);
	 }	
	 if(isset($_POST['masina'])){
	 	$query = "UPDATE piesa SET id_masina = '".$_POST['masina']."' WHERE id_piesa = '".$_POST['id_piesa']."'";
	 	mysqli_query($conn,$query);
	 }
	 if(isset($_FILES['img_path'])){
	 	$calea = "images/".$_FILES["img_path"]["name"];
			move_uploaded_file($_FILES["img_path"]["tmp_name"], $calea);
			$blob = addslashes(file_get_contents($calea));
		 	$query = "UPDATE piesa SET img = '".$blob."' WHERE id_piesa = '".$_POST['id_piesa']."'";
		 	echo "<a>".$query."</a>";
		mysqli_query($conn,$query);

	
	 }
	 $reg = mysqli_query($conn,"SELECT id_masina, img, denumire, pret FROM piesa WHERE id_piesa='".$_POST['id_piesa']."'");
	 $res = mysqli_fetch_array($reg);
 
	 if ((isset($_POST['denumire'])) || (isset($_POST['pret'])) || (isset($_POST['masina']) || (isset($_FILES['img_path'])))){
	 		echo '
	 		<script>
	 		window.location.href = "editeazaPiese.php";
	 		</script>
				 ';
	 }
	 
     
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifca Piesa</title>
	<link rel="stylesheet" href="editeazaMasini.css">
</head>
<body>
	<?php include('topClient.php'); ?>
	<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
			<p>Alege Modelul de Masina</p>
			 <select name="masina">
 				<?php 
 					$checkMasina = mysqli_query($conn,"SELECT * from masina");
	   				 while($row = mysqli_fetch_array($checkMasina)){
	   				 	echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']."</option>";
	   				 }
 				?>
			</select><br>
			<p>Denumire</p><input type="text" name="denumire" value="<?php echo $res[2]; ?>"><br>
			<p>Pret in RON</p><input type="text" name="pret" value="<?php echo $res[3]; ?>"><br>
			
			<p>Image</p><input class = "Butonel1" type="file" name="img_path"><br>
			<?php 
				echo "<img src='data:image/jpeg;base64,".base64_encode($res[1])."' height='100' width='100' >";
			?>
		<?php 
			echo "<input type='hidden' value='".$_POST['id_piesa']."' name='id_piesa'>";
		?>
		<br/>
		<input class = "Butonel1" type="submit" name="ok">
		</form>
		<button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
		<?php include('bottomClient.php'); ?>
</body>
</html>


<script>

			function back(){
					window.location.href = "editeazaPiese.php";
			}

</script>

