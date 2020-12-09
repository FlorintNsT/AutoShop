<?php 
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Client</title>
	<link rel="stylesheet" href="editeazaMasini.css">
</head>
<body>
	<?php include('../../common/topClient.php'); ?>
	<form action="" method="post">
	<p>Alege Modelul de Masina</p>
			<select name="masina">
	
			 <?php 
 					$checkMasina = mysqli_query($conn,"SELECT * from masina");
	   				 	echo "<option value = 'none'>----</option>";
	   				 while($row = mysqli_fetch_array($checkMasina)){
	   				 	if(isset($_POST['masina'])){
	   				 		if ($row['id_masina'] == $_POST['masina']){
	   				 			echo "<option selected value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";	
	   				 		}else{
	   				 			echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
	   				 		}
	   				 	}else{
	   				 		echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
	   				 	}
	   				 }
 				?>
			</select>
			<!-- <select tip='motor'>
				<option value='none'>---</option>
				<option value='benzina'>Benzina</option>
				<option value='Diesel'>Diesel</option>
			</select> -->
			<input  class='Butonel1' type="submit" name="search" value="Cautare">
	</form>
	<div id='centrat'>
			<?php 
				if (isset($_POST['search'])){
				 	$masina = $_POST['masina'];
				 		
				 		if ($masina === 'none'){
				 			$piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
					 	} else {
					 		$piesa = mysqli_query($conn,"SELECT * from piesa WHERE sters != 1 and id_masina = '".$masina."'");
					 	}


				 		
				 	
	   				
	   				 while($row = mysqli_fetch_array($piesa)){
	   				 	echo "<div id='cmmd'>";
	   				 	echo "<form action='modifPiesa.php' method='post'>";
	   				 	echo " ".$row['denumire'].' '.$row['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($row["img"])."' height='130' width='130'></a>";
	   					echo "<input class='Butonel1' type='submit' name='Edit' value='Editeaza'><br>";
	   					
	   					 echo "<input type='hidden' value='".$row['id_piesa']."' name='id_piesa'>";
	   					
	   					echo  "</form>";
	   					echo "</div>";
	   				 }

				 }else{
				// 	$masina = $_POST['masina'];
				 	$piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
	   				 while($row = mysqli_fetch_array($piesa)){
	   				 	echo "<div id='cmmd'>";
	   				 	echo "<form action='modifPiesa.php' method='post'>";
	   				 	echo " ".$row['denumire'].' '.$row['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($row["img"])."' height='130' width='130' ></a>";
	   			 		echo "<input class='Butonel1' type='submit' name='Edit' value='Editeaza'><br>";
	   			 		
	   			 		 echo "<input type='hidden' value='".$row['id_piesa']."' name='id_piesa'>";

	   			 		echo  "</form>";
	   			 		echo "</div>";
	   			 }

				 }
			?>
		</div>
		<br/>
		<button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
			<?php include('../../common/bottomClient.php'); ?>
</body>
</html>

<script>

			function back(){
					window.location.href = "admin.php";
			}

	</script>