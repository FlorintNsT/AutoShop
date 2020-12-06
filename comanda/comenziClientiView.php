<?php 

    class ComenziClientiView{

        public static function showView1($row){
            echo "<div id='cmmd'>";
            echo "<br>---------------<br>";
            echo $row;
            echo "<br>---------------<br>";
        }

        public static function showView2($denumire, $model, $producator, $tip_motor, $pret, $row2){
            echo $denumire;
            echo " ".$model." ".$producator." ".$tip_motor." ".$pret." RON
                <form action='detalii.php' method='post'>
                    <input type='submit' name='Detail' class = 'Butonel1' value='Detalii'><br>
                    <input type='hidden' value='".$row2."' name='id_piesa'>	
            </form>";
        }
        public static function showView3(){
        echo '
            <script>
                func detalii(){
                    alert("wtf");
                }
             </script>';
            echo '
            <!DOCTYPE html>
                <html>
                <head>
                    <title></title>
                </head>
                <body>
                </body>
                </html> ';
        }
    }


?>