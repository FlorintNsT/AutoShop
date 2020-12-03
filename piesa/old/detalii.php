<?php 

	session_start();
	$id_user = $_SESSION['id_user'];
	$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
		
		if(isset($_POST['id_piesa'])){
			$check= mysqli_query($conn,"SELECT * from piesa where id_piesa='".$_POST['id_piesa']."'");
			$res = mysqli_fetch_array($check);
		}

	
?>
 <link rel="stylesheet" href="client.css">
<!DOCTYPE html>
<html>
<head>
	<title>Produs</title>
</head>
<body>
	<?php include('topClient.php'); ?>
	<?php 
		echo "
		<p class='eticheta' >Denumire: ".$res['denumire']."</p><br> <p class='eticheta' >Pret:".$res['pret']." RON </p><br> <img src='data:image/jpeg;base64,".base64_encode($res["img"])."' height='350' width='350' ><br>

		";
	   				 	
		echo '
			<button class = "Butonel1"  name="Back" value="VBack" onclick="shop();" >Back</button>
    		<br></br>
		
    		<script>
    		
    				function shop(){
					window.location.href = "client.php?comanda=3";
         			}
		
		</script>
		';

	?>
	<?php include('bottomClient.php'); ?>
</body>
</html>