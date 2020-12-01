<?php 
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editeaza masina</title>
	<link rel="stylesheet" href="editeazaMasini.css">
</head>
<body>
	<?php include('topClient.php'); ?>
	<form action="" method="post">
	<p>Alege Producatorul</p>
			 <select name="producator">
 				<?php 
 					
 					$checkMasina = mysqli_query($conn,"SELECT DISTINCT producator from masina");
	   				 	echo "<option value = 'none'>----</option>";
	   				 while($row = mysqli_fetch_array($checkMasina)){
	   				 	if(isset($_POST['producator']))
	   				 		if ($row['producator'] == $_POST['producator']){
	   				 			echo "<option  selected value='".$row['producator']."'>".$row['producator']."</option>";
	   				 		}else{
	   				 			echo "<option value='".$row['producator']."'>".$row['producator']."</option>";
	   				 		}
	   				 	else{
	   				 		echo "<option value='".$row['producator']."'>".$row['producator']."</option>";
	   				 	}	

	   				 	
	   				 }
 				?>
			</select>
			<input class = "Butonel1" type="submit" name="search" value="Cautare">
	</form>
	  <div id="centrat">
	<?php 
				 if (isset($_POST['search'])){
				 	$producator = $_POST['producator'];
				 	

				 	
				 		
				 		if ($producator === 'none'){
				 			$masini = mysqli_query($conn,"SELECT * from masina");
					 	} else {
					 		$masini = mysqli_query($conn,"SELECT * from masina WHERE producator = '".$producator."'");
					 	}
					
					 
	   				
	   				 while($row = mysqli_fetch_array($masini)){
	   				 	echo "<div id='cmmd'>";
	   				 	echo "<br>---------------<br>";
	   				 	echo "<form action='modifMasina.php' method='post'>";
	   				 	echo " ".$row['producator'].' '.$row['model']." ".$row['tip_motor']." <br><br></a>";
	   					echo "<input type='submit' name='Edit' value='Editeaza'><br>";
	   					
	   					 echo "<input type='hidden' value='".$row['id_masina']."' name='id_masina'>";
	   					
	   					echo  "</form>";
	   					echo "</div>";
	   					
	   				 }

				 }else{
				// 	$masina = $_POST['masina'];
				 	$piesa = mysqli_query($conn,"SELECT * from masina");
	   				 while($row = mysqli_fetch_array($piesa)){
	   				 	echo "<div id='cmmd'>";
	   				 	echo "<br>---------------<br>";
	   				 	echo "<form action='modifMasina.php' method='post'>";
	   				 	echo " ".$row['producator'].' '.$row['model']." <br> <br></a>";
	   			 		echo "<input type='submit' name='Edit' value='Editeaza'><br>";
	   			 		
	   			 		 echo "<input type='hidden' value='".$row['id_masina']."' name='id_masina'>";

	   			 		echo  "</form>";
	   			 		echo "</div>";
	   			 		
	   			 }

				 }
		?>
		</div>
		<br/>
		<button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
		<?php include('bottomClient.php'); ?>
</body>
</html>

<script>

			function back(){
					window.location.href = "admin.php";
			}

	</script>