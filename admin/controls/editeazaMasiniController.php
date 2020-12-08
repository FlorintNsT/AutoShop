<?php 

$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
if(isset($_POST['producator'])){
    EditeazaMasiniController::startEditeazaMasiniController($conn, $_POST['producator']);
}else{
    EditeazaMasiniController::startEditeazaMasiniController($conn, 'none');
}

if (isset($_POST['search'])){
    EditeazaMasiniController::startWithSearch($conn, $_POST['producator']);
}else{
    EditeazaMasiniController::startWithoutSearch($conn);
}
class EditeazaMasiniController{

    public static function startEditeazaMasiniController($conn,$producator){
        include 'editeazaMasiniView.php';

        EditeazaMasiniView::showEditeazaMasiniView1();

        $checkMasina = mysqli_query($conn,"SELECT DISTINCT producator from masina");
                echo "<option value = 'none'>----</option>";
                while($row = mysqli_fetch_array($checkMasina)){

                if($producator === 'none')
                    if ($row['producator'] == $producator){
                        echo "<option  selected value='".$row['producator']."'>".$row['producator']."</option>";
                    }else{
                        echo "<option value='".$row['producator']."'>".$row['producator']."</option>";
                    }
                else{
                    echo "<option value='".$row['producator']."'>".$row['producator']."</option>";
                }
   
            }
        
            EditeazaMasiniView::showEditeazaMasiniView2(); 

            
        }
        public static function showEnd(){

            EditeazaMasiniView::showEditeazaMasiniView3();
        }
        public static function startWithSearch($conn, $producator){
				 	
            if ($producator === 'none'){
                $masini = mysqli_query($conn,"SELECT * from masina");
            } else {
                $masini = mysqli_query($conn,"SELECT * from masina WHERE producator = '".$producator."'");
            }
					
            while($row = mysqli_fetch_array($masini)){
                echo "<div id='cmmd'>";
                echo "<br>---------------<br>";
                echo "<form action='modifMasinaController.php' method='post'>";
                echo " ".$row['producator'].' '.$row['model']." ".$row['tip_motor']." <br><br></a>";
                echo "<input type='submit' name='Edit' value='Editeaza'><br>";
                
                    echo "<input type='hidden' value='".$row['id_masina']."' name='id_masina'>";
                
                echo  "</form>";
                echo "</div>";
            }

            EditeazaMasiniController::showEnd();
        }
        
        public static function startWithoutSearch($conn){
            $piesa = mysqli_query($conn,"SELECT * from masina");

                while($row = mysqli_fetch_array($piesa)){
                echo "<div id='cmmd'>";
                echo "<br>---------------<br>";
                echo "<form action='modifMasinaController.php' method='post'>";
                echo " ".$row['producator'].' '.$row['model']." <br> <br></a>";
                echo "<input type='submit' name='Edit' value='Editeaza'><br>";
                echo "<input type='hidden' value='".$row['id_masina']."' name='id_masina'>";
                echo  "</form>";
                echo "</div>";
                }

                EditeazaMasiniController::showEnd();
        }
        
    }

?>