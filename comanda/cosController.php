<?php 

    include "cosView.php";

    session_start();
   
    $lista = array();

    $conn = mysqli_connect('localhost','root','');
    $idUser = $_SESSION['id_user'];
    $res = CosController::getComenzi($conn, $idUser);
    $row = CosController::getComenziCount($conn, $idUser);

    $array = CosView::showPieseReturnLista($row, $res, $lista, $conn);

    $lista = $array[0];
    $sum = $array[1];
    CosView::showSum($lista, $sum);

    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Delete'])){
        
        $lista = $_POST['lista'];
        $idCos = $_POST['id_cos'];

        CosController::executeDelete($conn, $lista, $idCos, $idUser);
    }
   
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['CMD'])){
        
        $lista = $_POST['lista'];

        CosController::executeCMD($idUser ,$lista, $conn);
    }

    class CosController{

        public static function getComenzi($conn, $idUser){
		    mysqli_select_db($conn,'PieseAutoDB');
		    $res = mysqli_query($conn,"SELECT * from cos where id_user='".$idUser."'");
            $count = mysqli_query($conn,"SELECT count(*) as total from cos where id_user='".$idUser."'");
            $row = $count->fetch_row();
            return $res;
        }

        public static function getComenziCount($conn, $idUser){
		    mysqli_select_db($conn,'PieseAutoDB');
		    $res = mysqli_query($conn,"SELECT * from cos where id_user='".$idUser."'");
            $count = mysqli_query($conn,"SELECT count(*) as total from cos where id_user='".$idUser."'");
            $row = $count->fetch_row();
            return $row;
        }

        public static function executeDelete($conn, $lista, $idCos, $idUser){
            $contor = 0;
            foreach ($lista as $var) {
        	    $contor = $contor + 1;
            }
             if ($contor <= 1){
                $qr = "DELETE from cos where id_cos='".$idCos."'";
                $dl = mysqli_query($conn,"DELETE from cos where id_cos='".$idCos."'");
                mysqli_query($conn,$dl);
                echo '
                    <script>
                        window.location.href = "../client/clientController.php?comanda=2";
                    </script>
                    ';
            } else {
                $dl = mysqli_query($conn,"DELETE from cos WHERE id_user = '".$idUser."'");
                mysqli_query($conn,$dl);
                echo '
                    <script>
                        window.location.href = "../client/clientController.php?comanda=2";
                    </script>
                    ';
            }
        }
   
        public static function executeCMD($idUser, $lista, $conn){
            $dl = mysqli_query($conn,"DELETE from cos WHERE id_user = '".$idUser."'");
            foreach ($lista as $var) {
        	    $t = time();
        	    $qr = "INSERT INTO comanda (date, id_piesa,id_user) VALUES ('".date("Y-m-d",$t)." Ora-> ".date('H:i:s')."',".$var.",'".$idUser."')";
        	    mysqli_query($conn,$qr);
            }
     	    echo '
                <script>
                window.location.href = "../client/clientController.php?comanda=1";
                </script>
     	    ';
            mysqli_query($conn,$dl);
        }
    }


?>