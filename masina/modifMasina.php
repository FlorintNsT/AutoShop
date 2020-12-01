<?php 
	
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');

	if(isset($_POST['producator'])){
	 	$query = "UPDATE masina SET producator = '".$_POST['producator']."' WHERE id_masina = '".$_POST['id_masina']."'";
	 	mysqli_query($conn,$query);
	 }
	 if(isset($_POST['model'])){
	 	$query = "UPDATE masina SET model = '".$_POST['model']."' WHERE id_masina = '".$_POST['id_masina']."'";
	 	mysqli_query($conn,$query);
	 }	
	 if(isset($_POST['tip_motor'])){
	 	$query = "UPDATE masina SET tip_motor = '".$_POST['tip_motor']."' WHERE id_masina = '".$_POST['id_masina']."'";
	 	mysqli_query($conn,$query);
	 }

	$reg = mysqli_query($conn,"SELECT id_masina, producator, model, tip_motor FROM masina WHERE id_masina='".$_POST['id_masina']."'");
	 $res = mysqli_fetch_array($reg);		

	 if((isset($_POST['producator'])) || (isset($_POST['model'])) || (isset($_POST['tip_motor']))){

	 	echo '
	 		<script>
	 		window.location.href = "editeazaMasini.php";
	 		</script>
				 ';

	 }

	 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificare Masina</title>
	<link rel="stylesheet" href="editeazaMasini.css">
</head>
<body>
	<?php include('topClient.php'); ?>
	<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
		
		<label>Producator</label><br>
		
		<input type='text' name='producator' value="<?php echo $res[1]; ?>" ><br>
		<br/>
	
		<label>Model</label><br>
		
			<input type='text' name='model' value="<?php echo $res[2]; ?>"><br>
		
		<br/>
		<label>Tip_Motor</label><br>
		<select name="tip_motor">
			<?php 
				if($res[3] == 'benzina'){
					echo "<option selected value='benzina'>Benzina</option>";
					echo "<option value='diesel' >Diesel</option>";
				}else{
					echo "<option  value='benzina'>Benzina</option>";
					echo "<option selected value='diesel' >Diesel</option>";
				}
			?>
		</select>
		
		<?php 
			echo "<input type='hidden' value='".$_POST['id_masina']."' name='id_masina'>";
		?>
		<br/>
		<br/>
		<input class = "Butonel1" type="submit" name="ok" value="Salveaza">
	</form>
	<br/>
	<button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>

	<?php include('bottomClient.php'); ?>
</body>
</html>

<script>

			function back(){
					window.location.href = "editeazaMasini.php";
			}

	</script>

