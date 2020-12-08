<?php 

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'PieseAutoDB');

$producator = 'none';
$model = 'none';
$tip_motor = 'none';
$id_masina = 'none';
if(isset($_POST['producator'])){
    $producator = $_POST['producator'];
}

if(isset($_POST['model'])){
    $model = $_POST['model'];
}

if(isset($_POST['tip_motor'])){
    $tip_motor = $_POST['tip_motor'];
}

if(isset($_POST['id_masina'])){
    $id_masina = $_POST['id_masina'];
}

ModifMasinaController::startModifMasinaController($conn, $producator, $model, $tip_motor, $id_masina);
class ModifMasinaController{
    public static function startModifMasinaController($conn, $producator, $model, $tip_motor, $id_masina){

        include 'modifMasinaView.php';

        if($producator !== 'none'){
            $query = "UPDATE masina SET producator = '".$producator."' WHERE id_masina = '".$id_masina."'";
            mysqli_query($conn,$query);
        }
        if($model !== 'none'){
            $query = "UPDATE masina SET model = '".$model."' WHERE id_masina = '".$id_masina."'";
            mysqli_query($conn,$query);
        }	
        if($tip_motor !== 'none'){
            $query = "UPDATE masina SET tip_motor = '".$tip_motor."' WHERE id_masina = '".$id_masina."'";
            mysqli_query($conn,$query);
        }

        if(($producator !== 'none') || ($model !== 'none') || ($tip_motor !== 'none') ) {
            echo '
                <script>
                window.location.href = "editeazaMasiniController.php";
                </script>
            ';
        }

        if($id_masina !== 'none'){
            $reg = mysqli_query($conn,"SELECT id_masina, producator, model, tip_motor FROM masina WHERE id_masina='".$id_masina."'");
            $res = mysqli_fetch_array($reg);
            ModifMasinaView::showModifMasinaView($res,$id_masina);
        }

            
    }
}
?>