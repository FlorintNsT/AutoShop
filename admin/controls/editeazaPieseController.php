<?php 

$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');

EditeazaPieseController::startEditeazaPieseController($conn);

if (isset($_POST['search'])){
    $masina = $_POST['masina'];
    EditeazaPieseController::withSearch($conn,$masina);
}else{
    EditeazaPieseController::withOutSearch($conn);
}

class EditeazaPieseController{

    public static function startEditeazaPieseController($conn){
        include 'editeazaPieseView.php';
        EditeazaPieseView::showEditeazaPieseView1();

        $checkMasina = mysqli_query($conn,"SELECT * from masina");
            
        echo "<option value = 'none'>----</option>";
            while($row = mysqli_fetch_array($checkMasina)){
            if(isset($_POST['masina'])){
                if ($row['id_masina'] == $_POST['masina']){
                    echo "<option selected value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";	
                }else{
                    echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
                }
            }else{
                echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
            }
        }

        EditeazaPieseView::showEditeazaPieseView2();

    }

    public static function withSearch($conn, $masina){
            
            if ($masina === 'none'){
                $piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
            } else {
                $piesa = mysqli_query($conn,"SELECT * from piesa WHERE sters != 1 and id_masina = '".$masina."'");
            }

            while($row = mysqli_fetch_array($piesa)){
                echo "<div id='cmmd'>";
                echo "<form action='modifPiesaController.php' method='post'>";
                echo " ".$row['denumire'].' '.$row['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($row["img"])."' height='130' width='130'></a>";
                echo "<input class='Butonel1' type='submit' name='Edit' value='Editeaza'><br>";
                
                echo "<input type='hidden' value='".$row['id_piesa']."' name='id_piesa'>";
                
                echo  "</form>";
                echo "</div>";
            }

        
        EditeazaPieseView::showEnd();
        }
    
    public static function withOutSearch($conn){
        
        $piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
        while($row = mysqli_fetch_array($piesa)){
            echo "<div id='cmmd'>";
            echo "<form action='modifPiesaController.php' method='post'>";
            echo " ".$row['denumire'].' '.$row['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($row["img"])."' height='130' width='130' ></a>";
            echo "<input class='Butonel1' type='submit' name='Edit' value='Editeaza'><br>";
            
             echo "<input type='hidden' value='".$row['id_piesa']."' name='id_piesa'>";

            echo  "</form>";
            echo "</div>";
        }
        EditeazaPieseView::showEnd();
    }
}

?>