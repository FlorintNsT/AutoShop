
<?php 

$conn = mysqli_connect('localhost','root','');
        mysqli_select_db($conn,'PieseAutoDB');
        

if (isset($_POST['sterge'])){
    StergeMasinaController::deleteMasina($conn,$_POST['id_masina']);
    }
if(isset($_POST['producator'])){
    StergeMasinaController::startStergeMasinaController($conn, $_POST['producator']);
}else{
    StergeMasinaController::startStergeMasinaController($conn, 'none');
}

if (isset($_POST['search'])){
    StergeMasinaController::startWithSearch($conn, $_POST['producator']);
}else{
    StergeMasinaController::startWithoutSearch($conn);
}
class StergeMasinaController{

    public static function deleteMasina($conn,$id_masina){
        $query="DELETE FROM masina WHERE id_masina =".$id_masina ; 
        mysqli_query($conn,$query);

        $res = mysqli_query($conn,"UPDATE piesa set sters = 1 where id_masina='".$id_masina."'");
        mysqli_query($conn,$res);

        mysqli_query($conn,$res);

    }
    public static function startStergeMasinaController($conn,$producator){
        include 'stergeMasinaView.php';

        StergeMasiniView::showStergeMasinaView1();

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
        
            StergeMasiniView::showStergeMasinaView2(); 

            
        }
        public static function showEnd(){

            StergeMasiniView::showStergeMasinaView3();
        }
        public static function startWithSearch($conn, $producator){
				 	
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

            StergeMasinaController::showEnd();
        }
        
        public static function startWithoutSearch($conn){
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

                StergeMasinaController::showEnd();
        }
        
    }

?>