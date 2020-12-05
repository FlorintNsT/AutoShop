<?php 

    class CosView{

        public static function showPieseReturnLista($row, $res,$lista,$conn){
            $sum = 0;

            while ($row = mysqli_fetch_array($res)){
                $yak = [];
                $yak = mysqli_query($conn,"SELECT * from piesa where id_piesa='".$row['id_piesa']."'");
                $lin = mysqli_fetch_array($yak);
                echo "Denumire: ".$lin['denumire']."<br> Pret:".$lin['pret']." <br> <img src='data:image/jpeg;base64,".base64_encode($lin["img"])."' height='42' width='42' ><br>";
                $sum = $sum + $lin['pret'];
                array_push($lista, $lin['id_piesa']);
                echo "<form  action=".$_SERVER['PHP_SELF']." method='post' >";
                echo "<input class = 'Butonel1' type='submit' name='Delete' value='Sterge'><br>";
                echo "<input type='hidden' value='".$row['id_cos']."' name='id_cos'>";			
                echo  "</form>";    
             }
             return array($lista, $sum);
        
        }

        public static function showSum($lista, $sum){
            if ($sum > 0){
                echo "Total: ".$sum." RON";
                echo "<form  action=".$_SERVER['PHP_SELF']." method='post' >";
                echo "<input class = 'Butonel1' type='submit' name='CMD' value='Comanda'><br>";
                    foreach ($lista as $buc) {
                        echo "<input type='hidden' value='".$buc."' name='lista[]'>";		
                    }
                echo  "</form>";
            }else {
                echo "
                <b>Cosul este gol</b>
                ";
            }
        }
    }

?>