<?php 
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');

	if(isset($_POST['sterge'])){

		$query="UPDATE piesa set sters = 1 WHERE id_piesa =".$_POST['id_piesa'] ; 
		mysqli_query($conn,$query);


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Client</title>
	<link rel="stylesheet" href="editeazaMasini.css">
</head>
<body>
	<?php include('topClient.php'); ?>
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
			<input type="submit" name="search" value="Cautare">
	</form>
	<br/>
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
	   				 	echo "<form  action=".$_SERVER['PHP_SELF']." method='post' >";
	   				 	echo " ".$row['denumire'].' '.$row['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($row["img"])."' height='130' width='130' ></a>";
	   					echo "<input class = 'Butonel1' type='submit' name='Delete' value='Sterge'><br>";
	   					
	   					 echo "<input type='hidden' value='".$row['id_piesa']."' name='id_piesa'>";
	   					 echo "<input type='hidden' value='1' name='sterge'>";

	   					echo  "</form>";
	   					echo "</div>";
	   				 }

				 }else{
				// 	$masina = $_POST['masina'];
				 	$piesa = mysqli_query($conn,"SELECT * from piesa WHERE sters != 1");
	   				 while($row = mysqli_fetch_array($piesa)){
	   				 	echo "<div id='cmmd'>";
	   				 	echo "<form  action=".$_SERVER['PHP_SELF']." method='post' >";
	   				 	echo " ".$row['denumire'].' '.$row['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($row["img"])."' height='130' width='130' ></a>";
	   			 		echo "<input  class = 'Butonel1' type='submit' name='Delete' value='Sterge'><br>";
	   			 		
	   			 		 echo "<input type='hidden' value='".$row['id_piesa']."' name='id_piesa'>";
	   			 		 echo "<input type='hidden' value='1' name='sterge'>";

	   			 		echo  "</form>";
	   			 		echo "</div>";
	   			 }

				 }
			?>
			<br/>
		<button class = 'Butonel1'  name="Logout" value="Logout" onclick="back();"> Back</button>
			<?php include('bottomClient.php'); ?>
</body>
</html>

<script>

			function back(){
					window.location.href = "admin.php";
			}

</script>