<?php 
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
 		session_start();
 		$query = mysqli_query($conn,"SELECT DISTINCT date FROM comanda WHERE id_user='".$_SESSION['id_user']."' ORDER BY date DESC");
 			
 		 while($row = mysqli_fetch_array($query)){
 		 	
 		 	$qr2= mysqli_query($conn,"SELECT * FROM comanda WHERE date ='".$row[0]."'");
 		 	echo "<div id='cmmd'>";
 		 	echo "<br>---------------<br>";
 		 	echo $row[0];
 		 	echo "<br>---------------<br>";

 		 	
 		 	while($row2 = mysqli_fetch_array($qr2)){
 		 		
				
				//echo '</br>';
 		 		$qr3 =  "SELECT * from piesa where id_piesa='".$row2[1]."'";
 		 		$check= mysqli_query($conn,$qr3);
				$res = mysqli_fetch_array($check);
				 
				
				$qr4 = "SELECT * FROM masina WHERE id_masina = ".$res['id_masina'];
				$check2 = mysqli_query($conn,$qr4);
				$res1 = mysqli_fetch_array($check2);
				
 		 		
 		 		//if ($control != 0) {
 		 			echo $res['denumire'];
 		 			echo " ".$res1['model']." ".$res1['producator']." ".$res1['tip_motor']." ".$res["pret"]." RON

 		 			<form action='detalii.php' method='post'>
	   					
	   					<input type='submit' name='Detail' class = 'Butonel1' value='Detalii'><br>
						
	   	 			    <input type='hidden' value='".$row2[1]."' name='id_piesa'>	
	   				</form>";

	   				
 		 		//}
 		 		//	echo " </br>";
 		 			
 		 		
 		 		//echo '<br>';  <input type='hidden' value='".$row2[1]."' name='id_piesa'>		
 		 		
 		 	}
 		 	echo "</div>";

 		 }
 		 	echo '

 		 		<script>
	   					func detalii(){
	   						alert("wtf");

	   					}
	   			</script>
 		 	';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>

