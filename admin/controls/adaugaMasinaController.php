<?php 
    include 'adaugaMasinaView.php';
    include_once('../../common/config.php');

    if (isset($_POST['ok'])){
        AdaugaMasinaController::insertNewMasina($dbh);
    }else {
        AdaugaMasinaController::startAdaugaMasinaController();
    }

    class AdaugaMasinaController{

        public static function startAdaugaMasinaController(){
            AdaugaMasinaView::showAdaugaMasinaView();
        }

        public static function insertNewMasina($dbh){
            $conn = mysqli_connect('localhost','root','');
		    mysqli_select_db($conn,'PieseAutoDB');

            $producator=$_POST['producator'];
            $model=$_POST['model'];
            $tip_motor=$_POST['tip_motor'];
            $sql='INSERT INTO masina(producator,model,tip_motor) VALUES (:prod,:mod,:tip)';
            $query= $dbh -> prepare($sql);
            $query-> bindParam(':prod', $producator, PDO::PARAM_STR);
            $query-> bindParam(':mod', $model, PDO::PARAM_STR);
            $query-> bindParam(':tip', $tip_motor, PDO::PARAM_STR);
            $query-> execute();

            echo '
                <script>
                    window.location.href = "../adminController.php";
                </script>
            ';
        }

    }

?>