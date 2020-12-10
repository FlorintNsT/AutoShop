<?php 
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
    if (isset($_POST['sterge'])){
    	if($_POST['sterge'] == '1'){
		$query="DELETE FROM masina WHERE id_masina =".$_POST['id_masina'] ; 
		echo $_POST['id_masina'];
			mysqli_query($conn,$query);

		$res = mysqli_query($conn,"UPDATE piesa set sters = 1 where id_masina='".$_POST['id_masina']."'");
		mysqli_query($conn,$res);

		//$res = mysqli_query($conn,"DELETE from piesa where id_masina='".$_POST['id_masina']."'");
		mysqli_query($conn,$res);

		}
    }
	

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
			<input class = 'Butonel1' type="submit" name="search" value="Cautare">

	</form>
	<br/>

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
	   				 	echo "<form  action=".$_SERVER['PHP_SELF']." method='post' >";
	   				 	echo " ".$row['producator'].' '.$row['model'].' '.$row['tip_motor']. " <br><br></a>";
	   					echo "<input class = 'Butonel1' type='submit' name='Delete' value='Sterge'><br>";
	   					 echo "<input type='hidden' value='".$row['id_masina']."' name='id_masina'>";
	   					 echo "<input type='hidden' value='1' name='sterge'>";
	   					echo  "</form>";
	   					echo "</div>";
	   				 }

				 }else{
				// 	$masina = $_POST['masina'];
				 	$piesa = mysqli_query($conn,"SELECT * from masina");
	   				 while($row = mysqli_fetch_array($piesa)){
	   				 	echo "<div id='cmmd'>";
	   				 	echo "<form  action=".$_SERVER['PHP_SELF']." method='post' >";
	   				 	echo " ".$row['producator'].' '.$row['model'].' '.$row['tip_motor']." <br> <br></a>";
	   			 		echo "<input class = 'Butonel1' type='submit' name='Delete' value='Sterge'><br>";
	   			 		echo "<input type='hidden' value='".$row['id_masina']."' name='id_masina'>";
	   			 		echo "<input type='hidden' value='1' name='sterge'>";
	   			 		echo  "</form>";
	   			 		echo "</div>";
	   			 }

				 }
		?>
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