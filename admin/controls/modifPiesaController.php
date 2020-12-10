<?php 

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'PieseAutoDB');

$denumire = 'none';
$pret = 'none';
$masina = 'none';
$img_path = 'none';
$id_piesa = 'none';

if(isset($_POST['id_piesa'])){
    $id_piesa = $_POST['id_piesa'];
}

if(isset($_POST['denumire'])){
    $denumire = $_POST['denumire'];
}

if(isset($_POST['pret'])){
    $pret = $_POST['pret'];
}	

if(isset($_POST['masina'])){
    $masina = $_POST['masina'];
}

if(isset($_FILES['img_path'])){
    $img_path = $_FILES['img_path'];
}

ModifPiesaController::startModifPiesaController($conn, $denumire, $pret, $masina, $img_path, $id_piesa);

class ModifPiesaController{

    public static function startModifPiesaController($conn, $denumire, $pret, $masina, $img_path, $id_piesa){

        include 'modifPiesaView.php';
      
        if($denumire !== 'none'){
            $query = "UPDATE piesa SET denumire = '".$denumire ."' WHERE id_piesa = '".$id_piesa."'";
            mysqli_query($conn,$query);
        }
        if($pret !== 'none'){
            $query = "UPDATE piesa SET pret = '".$pret."' WHERE id_piesa = '".$id_piesa."'";
            mysqli_query($conn,$query);
        }	
        if($masina !== 'none'){
            $query = "UPDATE piesa SET id_masina = '".$masina."' WHERE id_piesa = '".$$id_piesa."'";
            mysqli_query($conn,$query);
        }
        if($img_path !== 'none'){
            $calea = "images/".$img_path["img_path"]["name"];
                move_uploaded_file($img_path["img_path"]["tmp_name"], $calea);
                $blob = addslashes(file_get_contents($calea));
                $query = "UPDATE piesa SET img = '".$blob."' WHERE id_piesa = '".$id_piesa."'";
                echo "<a>".$query."</a>";
            mysqli_query($conn,$query);
        }

        if (($denumire !== 'none') || ($pret !== 'none') || ($masina !== 'none') || ($img_path !== 'none')){
            
            echo '
	 		<script>
	 		window.location.href = "editeazaPieseController.php";
	 		</script>
                ';
            
        }

        if($id_piesa !== 'none'){
            $reg = mysqli_query($conn,"SELECT id_masina, img, denumire, pret FROM piesa WHERE id_piesa='".$id_piesa."'");
            $res = mysqli_fetch_array($reg);
            ModifPiesaView::showView($conn,$res, $id_piesa);
        }

    }
}

?>