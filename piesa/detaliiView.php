<?php 
    class DetaliiView{

        public static function showDetaliiView($obj){

            echo '
            <link rel="stylesheet" href="../client/client.css">
            <!DOCTYPE html>
            <html>
            <head>
                <title>Produs</title>
            </head>
            <body>
            ';

             include('../common/topClient.php');
             
            echo "
            <p class='eticheta' >Denumire: ".$obj->denumire."</p><br> <p class='eticheta' >Pret:".$obj->pret." RON </p><br> <img src='data:image/jpeg;base64,".base64_encode($obj->img)."' height='350' width='350' ><br>
    
            ";
                                        
            echo '
                <button class = "Butonel1"  name="Back" value="VBack" onclick="shop();" >Back</button>
                <br></br>
                <script>
                
                        function shop(){
                        window.location.href = "../client/clientController.php?comanda=3";
                            }
                </script>
            ';
            
            include('../common/bottomClient.php');
            echo '
            </body>
            </html>
            ';

        }

    }
?>