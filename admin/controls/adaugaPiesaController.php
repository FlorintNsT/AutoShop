<?php 

$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');

if(isset($_POST['masina']) && isset($_POST['denumire']) && isset($_POST['pret']) ){
    AdaugaPiesaController::insertPiesa($conn);
}else{
    AdaugaPiesaController::startAdaugaPiesaController($conn);
}

class AdaugaPiesaController{
    public static function startAdaugaPiesaController($conn){
       include_once "adaugaPiesaView.php";

       AdaugaPiesaView::showAdaugaPiesaView1();

        $checkMasina = mysqli_query($conn,"SELECT * from masina");
        while($row = mysqli_fetch_array($checkMasina)){
            echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
        }
        
        AdaugaPiesaView::showAdaugaPiesaView2();
    }

    public static function insertPiesa($conn){

        $calea = "../../images/".$_FILES["img_path"]["name"];
			move_uploaded_file($_FILES["img_path"]["tmp_name"], $calea);
			$blob = addslashes(file_get_contents($calea));
		 	$query="INSERT INTO piesa(id_masina,pret,denumire,img) VALUES ('".$_POST['masina']."','".$_POST['pret']."','".$_POST['denumire']."','".$blob."')";
		 	echo "<a>".$query."</a>";
		    mysqli_query($conn,$query);
            echo '
            <script>
                window.location.href = "../adminController.php";
            </script>
            ';
	
    }
}

?>